<?php
function connectDb2($requete, $param = null){
    try{
        $connexion = new PDO("mysql:host=".DBHOST.":".DBPORT.";dbname=".DBNAME.";charset=utf8",DBUSER,DBPWD);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $connexion -> query($requete);
        if(!is_null($param)){
            if($param){
                $datas = $result -> fetchAll();
            }else{
                $datas = $result -> fetch();
            }
            $connexion = null;
            return $datas;
        }else{
            $connexion = null;
        }
    }
    catch(PDOException $error){
        echo "n° ".$error->getCode()."<br/>";
        die ("Erreur : ".$error->getMessage()."<br/>");
    }
}
?>