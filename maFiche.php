<!-- //<?php
session_start();
// var_dump($_SESSION['id']);

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $pseudo=$_POST['pseudo'];
    $pwd1=$_POST['pass1'];
    $adresse=$_POST['adresse'];
    $today=date('d.m.y');
   $avatar=$_POST['avatar'];

$requete_login = "INSERT INTO `inscrit`(`nom`, `prenom`, `pseudo`, `pass1`, `adresse`, 'avatar')
VALUES ('$nom','$prenom','$pseudo','$pwd1','$adresse', '$avatar')";
$resultat_inscription = ConnectDb2($requete_login, true);
if(empty($nom) || empty($prenom) || empty($pseudo) || empty($pwd1) || empty($adresse) || empty($avatar)){
   echo 'Merci de remplir tous les champs';
}else{
    header('Location: ../pagePrincipale.php');
}
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
               'avatar' => $_SESSION['id'].".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            header('Location: profil.php?id='.$_SESSION['id']);
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
   }
}
?>
     <?php
     if(!empty($userinfo['avatar']))
     {
        ?>
        <h1>Ma Fiche</h1>
    <div class="photo"><img src="membres/avatar/"<?php echo $userinfo['avatar']; ?>" width="150"/>;
</div>
        <?php
     }
     ?>


  
