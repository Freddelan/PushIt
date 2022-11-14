<html>
<head>
	<title>galerie</title>
	<meta charset="utf-8">
	<style type="text/css">
	/* style  css pour la mise en page des articles */
	div{
		display: inline-block;
		text-align: center;
		margin: 15px;
	}
     img{
     	width: 200px;
     	height: 200px;
     }
	</style>
</head>
<body>

</body>
</html>
<?php
if(is_dir("images")){
$rep=opendir('images');

while ($fichier = readdir($rep))
   { 
      if($fichier!="." && $fichier!="..")
   echo '<div><img src="/images/'.$fichier.'" /><p> la taille :'.filesize("images/".$fichier).' bytes <p> la date de creation '.date("d-m-y h:m:s",filectime(("images/".$fichier))).'</p></p></div>';
	
}
closedir($rep);
}
else{
	echo "dossier introuvable";
}
