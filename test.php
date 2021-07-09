<?php 



$serveur = "localhost";

$login = "root";

$pass = "";

try{

    $db = new PDO("mysql:host=$serveur;dbname=ecoledb",$login,$pass);

    


$nom=$_POST['nom'];
$prenom=$_POST['prenom']; 
$sexe=$_POST['sexe']; 
$date=$_POST['date']; 
$lieu=$_POST['lieu']; 
$login=$_POST['login']; 
$password=$_POST['password'];
$contact = $_POST['contact'];
$role = $_POST['role'];
$email = $_POST['email'];



$sql='INSERT INTO  user(nom,prenom,sexe,date_naissance,lieu_de_naissance,email,login,password,contact,role) 
        VALUES("'.$nom.'","'.$prenom.'","'.$sexe.'","'.$date.'","'.$lieu.'","'.$email.'","'.$login.'","'.$password.'","'.$contact.'","'.$role.'")';
$db->exec($sql);


}catch (PDOException $e) {
    echo 'échec de la connexion'.$e->getMessage();
}




?>