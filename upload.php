<html>
<head>
	<title>Upload d'images</title>
	<meta charset="utf-8">
</head>
<body>
<form action="landing.php" method="post" enctype="multipart/form-data">
        <p>
                Formulaire d'envoi de fichier :<br />
                <input type="file" name="image" /><br /><br />
                
                <input type="submit" value="Envoyer le fichier" name="submit"/>
        </p>
       
</form>
<?php
if(isset($_POST ["submit"])){
// Tester si le fichier a été envoyé sans erreur
if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
{
        // Tester la taille du fichier
        if ($_FILES['image']['size'] <= 1000000)
        {
                // Tester si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['image']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // stocker le fichier définitivement dans le dossier "image"

                        move_uploaded_file($_FILES['image']['tmp_name'], 'image' . basename($_FILES['image']['name']));
                        echo "L'envoi a bien été effectué !<br>";
                }
                else{
                	echo "Erreur :Extension non autorisée.<br>";
                }
        }
        else{
        	echo "le fichier est trop gros<br>";
        }

   }
   else{
   	echo "Erreur  d'envoi<br>";
   }
}
?>
<a href="/galerie.php">Consulter les images</a>
</body>
</html>
