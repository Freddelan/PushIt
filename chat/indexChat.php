<?php
session_start();
var_dump($_SESSION['id']);
$bdd = new PDO('mysql:host=localhost;dbname=utilisateur;charset=utf8;', 'root', 'paradoxe0311');
if(!$_SESSION['pseudo']){
    header('Location: ConnexionChat.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexChat.css">
    <title>Tous les utilisateurs</title>
</head>
<body>
    <h2 class="titreIChat">Cliquez sur le nom d'un membre inscrit pour discuter avec...</h2>
 <div >   
    
<?php
$recupUser = $bdd->query('SELECT * FROM inscrit');
while($user = $recupUser->fetch()){
    ?>
    
    <a href="message.php?id=<?php echo $user['ID_inscrit']; ?>">
        <p class="nomInsc"><?php echo $user['pseudo']; ?></p>
        </a>
    </div>
    <?php
}


?>
</body>
</html>
