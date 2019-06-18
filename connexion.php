<?php
include("db.php");
date_default_timezone_set('Europe/Paris');


{

    if (empty($_POST['pseudo']) || empty($_POST['password'])) //Oublie d'un champ
    {
        $message = '<p class="hAlign">une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p class="hAlign">Cliquez <a href="./index.php">ici</a> pour revenir</p>';
    } else //On check le mot de passe
    {
        $query = $db->prepare('SELECT mdp, id, email, pseudo, date_inscription, date_visite
        FROM t_users WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();
        if ($data['mdp'] == md5($_POST['password'])) // Acces OK !
        {
            $temps = date("Y-m-d H:i");
            $_SESSION['pseudo'] = $data['pseudo'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['level'] = $data['admin'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['pass'] = $data['mdp'];
            $_SESSION['avatar'] = $data['avatar'];
            $_SESSION['date_inscription'] = $data['date_inscription'];
            $_SESSION['date_connexion'] = $data['date_visite'];
            $_SESSION['login'] = true;
            $query = $db->prepare('update t_users set date_visite=:date_connexion WHERE pseudo = :pseudo');
            $query->bindValue(':pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
            $query->bindValue(':date_connexion', $temps, PDO::PARAM_STR);
            $query->execute();
            $message = '<p class="hAlign">Bienvenue ' . $data['pseudo'] . ', 
			vous êtes maintenant connecté!</p>
			<p class="hAlign">Cliquez <a href="./index.php">ici</a> 
			pour revenir à la page d accueil</p>';
        } else // Acces pas OK !
        {
            $message = '<p class="hAlign">Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p class="hAlign">Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page d accueil</p>';
        }
        $query->CloseCursor();
    }
    echo $message . '</div></body></html>';
}
?>
