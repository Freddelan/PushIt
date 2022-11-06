<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=upload_file', 'root', "paradoxe0311");
}catch(PDOException $e){
    die('Erreur connexion : '.$e->getMessage());
}
require('../log.php');
require('../connecter.php');
?>
<?php
// var_dump($_POST);
// var_dump($_FILES);
// uploade une photo
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
    $tailleMax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['avatar']['size'] <= $tailleMax) {
       $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
       if(in_array($extensionUpload, $extensionsValides)) {
          $chemin = "/membres/avatar/".$_SESSION['id'].".".$extensionUpload;
          $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
          if($resultat) {
             $updateavatar = $bdd->prepare('UPDATE utilisateur SET avatar = :avatar WHERE id = :id');
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
//     $tmpName = $_FILES['file']['tmp_name'];
//     $name = $_FILES['file']['name'];
//     $size = $_FILES['file']['size'];
//     $error = $_FILES['file']['error'];
// $tmpName = $_FILES['file']['tmp_name'];
// $name = $_FILES['file']['name'];
// $size = $_FILES['file']['size'];
// $error = $_FILES['file']['error'];
// move_uploaded_file($tmpName, './upload/'.$name);
// $tabExtension = explode('.', $name);
// $extension = strtolower(end($tabExtension));
// //Tableau des extensions que l'on accepte
// $extensions = ['jpg', 'png', 'jpeg', 'gif'];
// if(in_array($extension, $extensions)){
//     move_uploaded_file($tmpName, './upload/'.$name);
// }
// else{
//     echo "Mauvaise extension";
// }
// //Taille max que l'on accepte
// $maxSize = 400000;
// if(in_array($extension, $extensions) && $size <= $maxSize){
//     move_uploaded_file($tmpName, './upload/'.$name);
// }
// else{
//     echo "Mauvaise extension ou taille trop grande";
// }
// if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
//     move_uploaded_file($tmpName, './upload/'.$name);
// }
// else{
//     echo "Une erreur est survenue";
// }
// if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
//     $uniqueName = uniqid('', true);
//     //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
//     $file = $uniqueName.".".$extension;
//     //$file = 5f586bf96dcd38.73540086.jpg
//     move_uploaded_file($tmpName, './upload/'.$file);
// }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inscription.css">
    <title>Inscription</title>
</head>
<body>
    
   
    <form class="formulaireI" method="post" action="" enctype="multipart/form-data"> 
        <label for="file" required="required">Votre Photo</label>
        <input type="file" name="avatar">
        <button type="submit">Enregistrer</button>
    
    <p>
    <u>Informations obligatoires :</u>
    </p>
    <!-- <form action="index.php" method="POST" enctype="multipart/form-data"></form> -->
        
    <p>
        <label>Entre ton nom : </label>
            <input type="text" name="nom" id="nom" />
        
    </p>
    <p>
        <label>Entre ton prénom : </label>
            <input type="text" name="prenom" id="prenom" />
        
    </p>
    <p>
        <label>Entre ton futur pseudo : </label>
            <input type="text" id="pseudo" name="pseudo" />
        
    </p>
    <p>
        <label>Entre ton futur mot de passe : </label>
            <input type="password" name="pass1" />
    </p> 
     <!-- <p><br>
        <label>Confirme ton mot de passe : </label>
            <input type="password" name="pass2" required="required"/>
        <br>
</p> -->
    <p><br>
        <label>Entre ton adresse e-mail (elle doit être valide pour confirmer ton inscription !) : </label>
        <input type="text" name="adresse" />
    </p><br>
    <br>
    <p>
<u>Informations facultatives :</u>
<br><br>
<p>
<p>    
<label>Quelle est ta date de naissance ?</p><br>
<select name="jour">
<option value="j1">01</option>
<option value="j2">02</option>
<option value="j3">03</option>
<option value="j4">04</option>
<option value="j5">05</option>
<option value="j6">06</option>
<option value="j7">07</option>
<option value="j8">08</option>
<option value="j9">09</option>
<option value="j10">10</option>
<option value="j11">11</option>
<option value="j12">12</option>
<option value="j13">13</option>
<option value="j14">14</option>
<option value="j15">15</option>
<option value="j16">16</option>
<option value="j17">17</option>
<option value="j18">18</option>
<option value="j19">19</option>
<option value="j20">20</option>
<option value="j21">21</option>
<option value="j22">22</option>
<option value="j23">23</option>
<option value="j24">24</option>
<option value="j25">25</option>
<option value="j26">26</option>
<option value="j27">27</option>
<option value="j28">28</option>
<option value="j29">29</option>
<option value="j30">30</option>
<option value="j31">31</option>
</select></label>
<select name="mois">
<option value="janvier">Janvier</option>
<option value="fevrier">Février</option>
<option value="mars">Mars</option>
<option value="avril">Avril</option>
<option value="mai">Mai</option>
<option value="juin">Juin</option>
<option value="juillet">Juillet</option>
<option value="aout">Août</option>
<option value="septembre">Septembre</option>
<option value="octobre">Octobre</option>
<option value="novembre">Novembre</option>
<option value="decembre">Decembre</option>
</select>
<input type="text" name="annee"/>
</p>
<p>
<label>Dans quel pays habites-tu ?</label></p>
<p>
<select name="pays"></p>
<option value="canada">Canada</option>
<option value="france">France</option>
<option value="belgique">Belgique</option>
<option value="autre">Autre...</option>
</select>
</label><br>
<br>

<p>
<label>Quel est ton sexe ?<br></p>
<p>
<label><input type="radio" name="sexe" id="masculin" value="masculin" />Masculin</label></p>
<p>
<label><input type="radio" name="sexe" id="feminin" value="feminin" />Feminin</label></p>
<br>
<p>
<label>Dans quelle région de votre pays habites-tu ?<br></p>
<br>
<input type="text" name="region"></input></label>
<br>
<br>
<p>
<textarea name="message" rows="8" cols="45">Tape un commentaire personnel dont tu voudrais nous faire part ici...</textarea>
</p>
<p>
<input type="submit" id="valider" name="valider" text="Valider l'inscription"/>
    <?php
    if (isset ($_POST['valider'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $pseudo=$_POST['pseudo'];
    $pwd1=$_POST['pass1'];
    $adresse=$_POST['adresse'];
    $today=date('d.m.y');

$requete_login = "INSERT INTO `inscrit`(`nom`, `prenom`, `pseudo`, `pass1`, `adresse`)
VALUES ('$nom','$prenom','$pseudo','$pwd1','$adresse')";
$resultat_inscription = ConnectDb2($requete_login, true);
if(empty($nom) || empty($prenom) || empty($pseudo) || empty($pwd1) || empty($adresse)) {
    echo 'Merci de remplir tous les champs';
}else{
    header('Location: ../pagePrincipale.php');
}

}
?>
</form>
</body>
</html>