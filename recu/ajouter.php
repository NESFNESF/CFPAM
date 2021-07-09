<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['valider']))
{
$nom=$_POST['nom'];
$prenom=$_POST['prenom']; 
$sexe=$_POST['sexe']; 
$date=$_POST['date']; 
$lieu=$_POST['lieu']; 
$montant=$_POST['montant']; 
$filiere=$_POST['filiere'];
$fourniture=$_POST['fourniture']; 
$examen=$_POST['examen']; 
$sql="INSERT INTO  etudiant(nom,prenom,sexe,date,lieu,montant,filiere,fourniture,examen) VALUES(:nom,:prenom,:sexe,:date,:lieu,:montant,:filiere,:fourniture,:examen)";
$query = $dbh->prepare($sql);
$query->bindParam(':nom',$nom,PDO::PARAM_STR);
$query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
$query->bindParam(':sexe',$sexe,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':lieu',$lieu,PDO::PARAM_STR);
$query->bindParam(':montant',$montant,PDO::PARAM_STR);
$query->bindParam(':filiere',$filiere,PDO::PARAM_STR);
$query->bindParam(':fourniture',$fourniture,PDO::PARAM_STR);
$query->bindParam(':examen',$examen,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Etudiant enregistré avec success";
header("location:liste.php");
}
else 
{
$error="Enregistrement echouer. S'il vous plaît essayer encore";
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Enregistrement d'un etudaint</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
         <link rel="stylesheet" type="text/css" href="./theme/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Enregistrement d'un etudiant</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Accueil</a></li>
                                
                                        <li class="active">Enregistrement</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div><?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong></strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">
    <div class="container col-md-6 col-md-offset-3 space">
        <div class="panel panel-info">
            <div class="panel-heading">
                Inscription des étudiants
            </div>
            <div class="panel-body">
                    
                     <div class="form-group">
                        <input type="text" name="nom" class="form-control" required="required" placeholder="entrée votre nom">
                     </div>
                     <div class="form-group">
                        <input type="text" name="prenom" class="form-control" required="required" placeholder="entrée votre prénom">
                     </div>
                     <div class="form-group">
                        <select id="sexe" class="form-control" name="sexe">
                            <option value="" selected>
                                Votre sexe
                            </option>
                              <option > Masculin</option>
                              <option>Feminin</option>
                          </select>
                     </div>
                     <div class="form-group">
                        <input type="date" name="date" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="text" name="lieu" class="form-control" placeholder="entrée votre lieu de naissance">
                     </div>
                     <div class="form-group">
                        <input type="text" name="montant" class="form-control" required="required" placeholder="entrée le montant pour votre inscription">
                     </div>

                     <div class="form-group">
                        <input type="text" name="fourniture" class="form-control" placeholder="entrée le montant de vos frais de fourniture">
                     </div>

                     <div class="form-group">
                        <input type="text" name="examen" class="form-control" placeholder="entrée le montant de vos frais d'examen">
                     </div>
                                        <div class="form-group row">
                    <div class="col-sm-6">
                       <select class="form-control"id="filiere" name="filiere"   onChange="afficherGroupe()" required required="required">
                            <option value="" selected>
                                Votre filière
                            </option>

                               <?php
                                      $sql = "SELECT * FROM filiere "; 
                                        $result=$dbh->query($sql);  

                                       $data=$result->fetchAll(PDO::FETCH_ASSOC);
                                      foreach ($data as $donne){
                                      
                                              
                                                       ?>
                                       <option ><?php echo $donne['nofiliere']; ?></option>
                                     
                                       
                                          <?php

                                                          
                                             }?>
                        </select>
                        <div class="has-error">
                            
                        </div>
                    </div>
                    <div class="col-sm-6">
                          <select class="form-control"id="niveau" name="niveau"  onChange="afficherniveaux()" required>
                            <option  selected>
                                Votre niveau
                            </option>
                   
                            
                            <option >
                                BEPC/CAP
                            </option>
                            
                            <option >
                                Probatoire
                            </option>
                            
                            <option >
                                Baccalauréat
                            </option>
                            
                            <option >
                                BAC +
                            </option>
                            
                           
                            
                        </select>
                        <div class="has-error">
                            
                        </div>
                    </div>
                </div>
                      <div class="form-group">
                       <select id="session" name="session" required class="form-control" required>
                            <option value="" selected >
                                Votre session
                            </option>
                            
                  <option >Octobre (cours du jour)</option> 
                  <option >Janvier (cours du soir)</option>
                  <option >Avril (cours du jour)</option>
                  <option >Juillet (cours du soir)</option>
                  
                      
                            
                        </select>
                     </div>
                      <button class="btn btn-primary"type="submit" style="background-color: blue;" name="valider">
                    Enregistrer
                </button>
                <button class="btn btn-danger"type="reset">
                    Annuler
                </button>
                <button class="btn btn-success">
                    Imprimer
                </button>
                </form>
                </div>
            </div>
        </div>
    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
      



        <script>

  function afficherGroupe(){
  var selectBasic = document.getElementById("filiere");
  var groupe = document.getElementById("groupes");
  var niveau = document.getElementById("niveau");
  var value = selectBasic.options[selectBasic.selectedIndex].value;
  switch(value) {
    
                  

    case 'Comptabilité informatisée et gestion':
      
        niveau.options.length = 0;
        
           
     
        niveau.options[niveau.options.length] = new Option('Probatoire');
        niveau.options[niveau.options.length] = new Option('Baccalauréat');
    break;

    case 'Dévéloppeur d\'application':
      
        niveau.options.length = 0;
           
           
           
        niveau.options[niveau.options.length] = new Option('Baccalauréat');

        break;

    case 'Gestion des ressources humaines':
            
            niveau.options.length = 0;
           
           
            
            niveau.options[niveau.options.length] = new Option('BACC +');
            break;

    case 'Graphisme de production':
    
            niveau.options.length = 0;
              
           

        
        niveau.options[niveau.options.length] = new Option('Baccalauréat');
            break;

                  


    case 'Maintenance et réseaux informatiques':
                
            niveau.options.length = 0;// je vide la liste select
                
           
            

        niveau.options[niveau.options.length] = new Option('Diplome de Maintenance');
        

            break;


    case 'Sécrétariat bureautique bilingue':
                
            niveau.options.length = 0;// je vide la liste select
               
           
         niveau.options[niveau.options.length] = new Option('BEPC');
        niveau.options[niveau.options.length] = new Option('Probatoire');
       
          break;

    case 'Sécrétariat bureautique':
              
            niveau.options.length = 0;// je vide la liste select
            
            ;
             niveau.options[niveau.options.length] = new Option('BEPC');
        niveau.options[niveau.options.length] = new Option('Probatoire');
      

          break;
  
    case 'Sécrétariat comptable':
          
            niveau.options.length = 0;// je vide la liste select
            
           
             niveau.options[niveau.options.length] = new Option('BEPC');
        niveau.options[niveau.options.length] = new Option('Probatoire');
        

          break;

    case 'web master':
          
            niveau.options.length = 0;// je vide la liste select
                         
        niveau.options[niveau.options.length] = new Option('Baccalauréat');

          break;


}
}
</script>

    </body>
</html>
<?PHP } ?>
