<?php 
session_start();
include('../config.php');

 if(isset($_POST['valider'])){
   if(!empty($_POST['username']) AND !empty($_POST['password']))
   {
    $nomUtilisateur = htmlspecialchars($_POST['username']);
    $mdp = htmlspecialchars($_POST['password']);

$requete_login = "SELECT pseudo, pass1, ID_inscrit FROM inscrit WHERE pseudo = '".$nomUtilisateur."' AND pass1 = '".$mdp."'";
$resultat_login = connectDb2($requete_login, false);

    
    if($resultat_login){
        
        $_SESSION['password'] = $mdp;
        $_SESSION['login'] = $nomUtilisateur;
        $_SESSION['id'] = $resultat_login['ID_inscrit'];
        header('Location: indexChat.php');
    }else{
        echo "Mot de passe ou pseudo incorrect";
    }

   }else{
    echo "Veuillez compléter tous les champs";
   }
               }
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Page Login</title>
</head>
<body><div class="form">
    <form method="post" action="" autocomplete="off">
        
        <p >
            <strong>Entrez dans le chat :</strong><br>
            <br>
            <label class="info">Entre ton pseudo : 
                <input class="name" type="text" name="username" required="required"/>
            </label>
        </p>
        <p>
            <label class="info">Entre ton mot de passe : 
                <input class="mdp" type="password" name="password" required="required"/>
            </label>
        </p>
        <p>
            <input class="submit" type="submit" name="valider" required="required" />
        </p>
        
    </form>
<p>
    <a href="inscription.php">Tu n'es pas encore inscrit !? Clique vite ici ;) !</a>
</p>
</div>
</body>
</html>