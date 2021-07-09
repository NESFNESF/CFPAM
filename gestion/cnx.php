
<?php 
   
   $serveur = "localhost";

   $login = "root";

   $pass = "";

   try{

       $conn = new PDO("mysql:host=$serveur;dbname=ecoledb",$login,$pass);

       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


   }catch (PDOExeption $e) {
       echo 'échec de la connexion'.$e->gesMessage();
   }

?>