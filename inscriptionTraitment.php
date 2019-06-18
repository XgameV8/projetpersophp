<?php

include("db.php");


    $pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
    $mdp_erreur = NULL;
    $email_erreur1 = NULL;
    $email_erreur2 = NULL;
    $avatar_erreur = NULL;
    $avatar_erreur1 = NULL;
    $avatar_erreur2 = NULL;
    $avatar_erreur3 = NULL;

    //On récupère les variables
    $i = 0;
    $temps = date("Y-m-d");
    $tempsMinutes = date("Y-m-d H:i");
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $confirm = md5($_POST['confirm']);

    //Vérification du pseudo
    $query = $db->prepare('SELECT COUNT(*) AS nbr FROM t_users WHERE pseudo =:pseudo');
    $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $query->execute();
    $pseudo_free = ($query->fetchColumn() == 0) ? 1 : 0;
    $query->CloseCursor();
    if (!$pseudo_free) {
        $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
        $i++;
    }

    if (strlen($pseudo) < 3 || strlen($pseudo) > 15) {
        $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
        $i++;
    }

    //Vérification du mdp
    if ($pass != $confirm || empty($confirm) || empty($pass)) {
        $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
        $i++;
    }
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM t_users WHERE pseudo =:pseudo');
    $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
    $query->execute();
    $pseudo_free=($query->fetchColumn()==0)?1:0;

    //Vérification de l'adresse email

    //Il faut que l'adresse email n'ait jamais été utilisée
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM t_users WHERE email =:mail');
    $query->bindValue(':mail',$email, PDO::PARAM_STR);
    $query->execute();
    $mail_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();

    if(!$mail_free)
    {
        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
    }
    //On vérifie la forme maintenant
    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
    {
        $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
        $i++;
    }

    //Vérification de l'avatar :
    if (!empty($_FILES['avatar']['size']))
    {
        //On définit les variables :
        $maxsize = 50024; //Poids de l'image
        $maxwidth = 256; //Largeur de l'image
        $maxheight = 256; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides

        if ($_FILES['avatar']['error'] > 0)
        {
            $avatar_erreur = "Erreur lors du transfert de l'avatar : ";
        }
        if ($_FILES['avatar']['size'] > $maxsize)
        {
            $i++;
            $avatar_erreur1 = "Le fichier est trop gros : (<strong>".$_FILES['avatar']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        $image_sizes = getimagesize($_FILES['avatar']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
            $i++;
            $avatar_erreur2 = "Image trop large ou trop longue : 
                (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
        }

        $extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
            $i++;
            $avatar_erreur3 = "Extension de l'avatar incorrecte";
        }
    }
    if ($i==0)
    {
        echo'<h1 class="hAlign">Inscription terminée</h1>';
        echo'<p class="hAlign">Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit sur le site</p>
	    <p class="hAlign">Cliquez <a href="./index.php">ici</a> pour revenir à la page d accueil</p>';

        $nomavatar= (!empty($_FILES['avatar']['size']))? (new moveAvatar)->move_avatar($_FILES['avatar']):'defaut.jpg';

        $query=$db->prepare('INSERT INTO t_users (pseudo, mdp, email,
        avatar, date_inscription,   
        date_visite, admin, modo)
        VALUES (:pseudo, :pass, :email, :avatar, :temps, :tempsMinutes, FALSE, FALSE)');
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':pass', $pass, PDO::PARAM_INT);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':avatar', $nomavatar, PDO::PARAM_STR);
        $query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->bindValue(':tempsMinutes', $tempsMinutes, PDO::PARAM_INT);
        $query->execute();

        //Et on définit les variables de sessions
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['id'] = $db->lastInsertId(); ;
        $_SESSION['email'] = $email;
        $_SESSION['level'] = 2;
        $_SESSION['pass'] = $pass;
        $_SESSION['avatar'] = $nomavatar;
        $_SESSION['date_inscription'] = $temps;
        $_SESSION['date_connexion'] = $tempsMinutes;
        $_SESSION['login'] = true;
        $query->CloseCursor();
    }
    else
    {
        echo'<h1 class="hAlign">Inscription interrompue</h1>';
        echo'<p class="hAlign">Une ou plusieurs erreurs se sont produites pendant l incription</p>';
        echo'<p class="hAlign">'.$i.' erreur(s)</p>';
        echo'<p class="hAlign">'.$pseudo_erreur1.'</p>';
        echo'<p class="hAlign">'.$pseudo_erreur2.'</p>';
        echo'<p class="hAlign">'.$mdp_erreur.'</p>';
        echo'<p class="hAlign">'.$email_erreur1.'</p>';
        echo'<p class="hAlign">'.$email_erreur2.'</p>';
        echo'<p class="hAlign">'.$avatar_erreur.'</p>';
        echo'<p class="hAlign">'.$avatar_erreur1.'</p>';
        echo'<p class="hAlign">'.$avatar_erreur2.'</p>';
        echo'<p class="hAlign">'.$avatar_erreur3.'</p>';

        echo'<p class="hAlign">Cliquez <a href="./register.php">ici</a> pour recommencer</p>';
    }
}
?>