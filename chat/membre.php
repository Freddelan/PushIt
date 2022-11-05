<?php
session_start(); 
 //on vérifie toujours qu'il s'agit d'un membre qui est connecté
 if (!isset($_SESSION['login'])) {
 	// si ce n'est pas le cas, on le redirige vers l'accueil
 	 header ('Location: login.php');
 	// exit();

  }
 
 include('../connexion.php');
 include('../header.php');
 include('../connecter.php');
 include('../log.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>coucou</h1>

 Bienvenue <?php echo stripslashes(htmlentities(trim($_SESSION['login']))); ?> !<br /><br />
<?php 
 $base = mysql_connect ('serveur', 'login', 'password');
 mysql_select_db ('nom_base', $base);

// on prépare une requete SQL cherchant tous les titres, les dates ainsi que l'auteur des messages pour le membre connecté
 $requete_login = ('SELECT msg, date_, inscrit.pseudo as expediteur, messages.Id_message FROM messages JOIN inscrit ON inscrit.pseudo = messages.expediteur WHERE destinataire="'.$_SESSION['login'].'" OR expediteur="'.$_SESSION['login'].'" ORDER BY date_ DESC 
AND expediteur=membre.id');
$resultat_login = connectDb2($requete_login, true);


 if($resultat_login) {
     $_SESSION['login'] = $resultat_login;
     header('Location: membre.php');
 }
 //lancement de la requete SQL
  $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
  $nb = mysql_num_rows($req);

 if ($nb == 0) {
 	echo 'Vous n\'avez aucun message.';
 }
 else {
	// si on a des messages, on affiche la date, un lien vers la page lire.php ainsi que le titre et l'auteur du message
	 while ($data = mysql_fetch_array($req)) {
	 echo $data['date'] , ' - <a href="lire.php?id_message=' , $data['id_message'] , '">' , stripslashes(htmlentities(trim($data['titre']))) , '</a> [ Message de ' , stripslashes(htmlentities(trim($data['expediteur']))) , ' ]<br />';
	 }
}
 mysql_free_result($req);
 mysql_close();
?>
<br /><a href="envoyer.php">Envoyer un message</a>
<br /><br /><a href="deconnexion.php">Déconnexion</a>
</body>
</html>