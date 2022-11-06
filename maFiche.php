<?php
session_start();
var_dump($_SESSION['id']);
$bdd = new PDO('mysql:host=localhost;dbname=utilisateur;charset=utf8;', 'root', 'paradoxe0311');
if(!$_SESSION['pseudo']){
    header('Location: ConnexionChat.php');
}
include("header.php");
require('log.php');
 

 ?>


<h1>Ma Fiche</h1>
    <div class="photo">
     <?php
     if(!empty($userinfo['avatar']))
     {
        ?>
        <img src="membres/avatar/<?php echo $userinfo['avatar']; ?>" width="150"/>;
        <?php
     }
     ?>

</div>

    <!-- <form action="" method="POST" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form> -->
