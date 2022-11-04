<?php
session_start();
var_dump($_SESSION['id']);
$bdd = new PDO('mysql:host=localhost;dbname=utilisateur;charset=utf8;', 'root', 'paradoxe0311');
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo'])){

        $recupUser = $bdd->prepare('SELECT * FROM inscrit WHERE pseudo = ?');
        $recupUser->execute(array($_POST['pseudo']));
        $infoPseudo=$recupUser->fetch();
        var_dump($infoPseudo);
        if($recupUser->rowCount()>0){

            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['id'] = $infoPseudo['ID_inscrit'];
            header('Location: indexChat.php');

        }else{
            echo "Aucun Utilisateur trouvé";
        }
    }else{
        echo "Veuillez rentrer votre pseudo";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace de connexion</title>
</head>
<body>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo">
        <br/>
        <input type="submit" name="valider">
    </form>
</body>
</html>