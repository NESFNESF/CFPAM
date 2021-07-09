<?php

include('includes/config.php');


$session=$_POST['session']; 
$annee=$_POST['annee']; 

$idfiliere = $_POST['filiere'];
$sql1 = "SELECT * FROM module WHERE idfiliere='$idfiliere' "; 
$result1=$dbh->query($sql1);  




$data1=$result1->fetchAll(PDO::FETCH_ASSOC);
//$data1 = $result1->fetch();
$sql = "SELECT nom , prenom FROM etudiant WHERE session='$session' AND annee='$annee' "; 
$result=$dbh->query($sql);  

$data=$result->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['etudiant'] = $data;
$_SESSION['module'] = $data1;

echo print_r($_SESSION['etudiant']);
echo print_r($_SESSION['module']);
header("Location: note_two.php"); 


?>