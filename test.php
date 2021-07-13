<?php 

include('includes/config.php');


try{


    $nom=$_POST['nom'];
    $prenom=$_POST['prenom']; 
    $sexe=$_POST['sexe']; 
    $date=$_POST['date']; 
    $lieu=$_POST['lieu']; 
    $montant=$_POST['montant']; 
    $filiere=$_POST['filiere'];
    $fourniture=$_POST['fourniture']; 
    $examen=$_POST['examen']; 
    
    $session=$_POST['session']; 
    $annee=$_POST['annee']; 

    echo "nom : ".$nom." prenom : ".$prenom." sexe : ".$sexe."date : ".$date." lieu : ".$lieu." montant :".$montant."filiere :".$filiere."fourniture  ".$fourniture." examen : ".$examen." session :".$session." annee :".$annee;
    $sql="INSERT INTO  etudiant(nom,prenom,sexe,date,lieu,montant,filiere,fourniture,examen,session,annee) VALUES('$nom','$prenom','$sexe','$date','$lieu','$montant','$filiere','$fourniture','$examen','$session','$annee')";
    $dbh->exec($sql);

    echo print_r("sa marche !");
}catch (PDOException $e) {
    echo 'échec de la connexion'.$e->getMessage();
}




?>