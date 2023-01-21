<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=mabase","root","paradoxe0311");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>