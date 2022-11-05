<?php
session_start();
// var_dump($_SESSION['id']);
 $boulette= true;
 $bdd = new PDO('mysql:host=localhost;dbname=utilisateur;charset=utf8;', 'root', 'paradoxe0311');
 if(!$_SESSION['pseudo']){
     header('Location: ConnexionChat.php');
 }
  if(isset($_GET['id']) AND !empty($_GET['id'])){

     $getid = $_GET['id'];
       $recupUser = $bdd->prepare('SELECT * FROM inscrit WHERE ID_inscrit= ?');
      $recupUser->execute(array($getid));
      $user = $recupUser->fetch();
      
      if($user !=false){
     if(isset($_POST['envoyer']) && $boulette==true){
        $message= htmlspecialchars($_POST['message']);
         $insererMessage = $bdd->prepare('INSERT INTO messages(msg, destinataire, expediteur)VALUES(?, ?, ?)');
         $insererMessage->execute(array($message, $getid, $_SESSION['id']));
         $boulette=false;
        header('Refresh:0; '.$_SERVER["REQUEST_URI"]); //suprime ce qu'il y a dans le $get (evite répétition de message au refresh
     }
  }
 else{
       echo "Aucun utilisateur trouvé";
 }
 
  }else{
     echo "Aucun identifiant trouvé";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/message.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Privé</title>
</head>
<body>
    
    <form method="POST" action="">
        <textarea class="contenue" value=""  name="message"></textarea>
        <br><br>
        <input class="envoyer" type="submit" name="envoyer">
    </form>
    <section id="messages" >

        <?php
       $getid = $_GET['id'];
        $recupMessages = $bdd->prepare('SELECT * FROM messages WHERE expediteur = ? AND destinataire = ? OR expediteur = ? AND destinataire = ? ORDER BY date_ DESC');
        $recupMessages->execute(array($_SESSION['id'], $getid, $getid, $_SESSION['id']));
   
        $user = $recupMessages->fetchAll();
        // var_dump($user);
        $recupUser = $bdd->prepare('SELECT pseudo FROM inscrit WHERE ID_inscrit = ?');
        $recupUser->execute(array($getid));
        $pseudoUser =$recupUser->fetch();
        


        for($i=0; $i < count($user); $i++){
            if($user[$i]['destinataire'] == $_SESSION['id']){
            ?>
            <p class="messageOut"><?= $user[$i]['msg']; ?></p>
            <?php  
        }elseif ($user[$i]['destinataire'] == $getid) {
            ?>
            <p class="messageIn"><?= $user[$i]['msg']; ?></p>
            <?php
        }
    }
        ?>
            <p class="nomdesti">Vous discutez avec <?=$pseudoUser[0];?></p>
            <div id="discussion"></div>
    </section>
    <script type="text/javascript">
 
// var auto_refresh = setInterval(
// function ()
// {$('#discussion').load('message.php').fadeIn("slow");}, 3000);
// // Le réglage est ici sur 3000 milliseconds soit 3 secondes
 
</script>
</body>
</html>