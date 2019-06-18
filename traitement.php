<?php


$db = new PDO('mysql:host=localhost;dbname=films', 'root', '123');

{
    if (empty($_POST['email']) || empty($_POST['mdp']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./index.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query=$db->prepare('SELECT user_mdp, user_id, user_email
        FROM users WHERE user_email = :email');
        $query->bindValue(':',$_POST['email'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
	if ($data['user_mdp'] == md5($_POST['mdp'])) // Acces OK !
	{
	    $_SESSION['email'] = $data['user_email'];
	    $_SESSION['id'] = $data['user_id'];
	    $message = '<p>Bienvenue '.$data['user_email'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="./index.php">ici</a> 
			pour revenir à la page d accueil</p>';
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a href="./index.php.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page d accueil</p>';
	}
    $query->CloseCursor();
    }
    echo $message.'</div></body></html>';

}
?>
