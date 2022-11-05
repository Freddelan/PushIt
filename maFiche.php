<?php
session_start();
// var_dump($_SESSION['id']);
$bdd = new PDO('mysql:host=localhost;dbname=utilisateur;charset=utf8;', 'root', 'paradoxe0311');
if(!$_SESSION['pseudo']){
    header('Location: ConnexionChat.php');
}
include("header.php");

 ?>


<div class="photo"> <?php
header ("Content-type: image/jpeg");
$image = imagecreatefromjpeg(300,100)('background100.jpg');
imagejpg($image);
?></div>



