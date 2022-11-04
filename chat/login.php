<?php 
session_start();
include('../connecter.php');
include('../log.php');
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
        header('Location: connexionChat.php');
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
    
    <title>Page Login</title>
</head>
<body>
    <form method="post" action="" autocomplete="off">
        <p>
            <strong>Entrez dans le chat :</strong><br>
            <br>
            <label>Entre ton pseudo : 
                <input type="text" name="username" required="required"/>
            </label>
        </p>
        <p>
            <label>Entre ton mot de passe : 
                <input type="password" name="password" required="required"/>
            </label>
        </p>
        <p>
            <input type="submit" name="valider" required="required" />
        </p>
        
    </form>
<p>
    <a href="inscription.php">Tu n'es pas encore inscrit !? Clique vite ici ;) !</a>
</p>

</body>
</html>