<?php
session_start();
require("log.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="index.css"> -->
    <link rel="stylesheet" type="text/html" href="connexion.css">
    
    <title>PushIt</title>
</head>

<body>
<!--  login de la toute premiere page -->
    
        
        <div id="container" align="center">
            <!-- zone de connexion -->

            <form action="" method="POST">
                <h1>Connexion</h1>

                <label ><p color="red">Nom d'utilisateur</p></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><p>Mot de passe</p></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password"  autocomplete="off
                " required>


                <input type="submit" id='submit' name="valider" value='LOGIN'>
               <?php if(isset($_POST['valider'])){
   if(!empty($_POST['username']) AND !empty($_POST['password']))
   {
    $nomUtilisateur = htmlspecialchars($_POST['username']);
    $mdp = htmlspecialchars($_POST['password']);
    
    $requete_login = "SELECT nom_utilisateur, mot_de_passe FROM connexion WHERE nom_utilisateur = '".$nomUtilisateur."' AND mot_de_passe = '".$mdp."'";
    $resultat_login = connectDb2($requete_login, true);
    
    if($resultat_login){
        $_SESSION['password'] = $mdp;
        header('Location: pagePrincipale.php');
    }else{
        echo  "Mot de passe ou pseudo incorrect";
    }

   }else{
    echo "Veuillez compléter tous les champs";
   }
               }
            
?>
            </form>
      
    <hr>
   
    </hr>
    
</body>

</html>

<!-- Lien expliquant la page de connection : http://www.codeurjava.com/2016/12/formulaire-de-login-avec-html-css-php-et-mysql.html -->