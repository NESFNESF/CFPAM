<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

$stid=intval($_GET['stid']);
if(isset($_POST['valider']))
{
$nom=$_POST['nom'];
$prenom=$_POST['prenom']; 
$sexe=$_POST['sexe']; 
$date=$_POST['date']; 
$lieu=$_POST['lieu'];  
$sql="update etudiant set nom=:nom,prenom=:prenom,sexe=:sexe,date=:date,lieu=:lieu where id=:stid ";
$query = $dbh->prepare($sql);
$query->bindParam(':nom',$nom,PDO::PARAM_STR);
$query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
$query->bindParam(':sexe',$sexe,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':lieu',$lieu,PDO::PARAM_STR);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$msg="Etudiant modifié avec success";
}


?>
<!DOCTYPE html>
<html lang="en">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Modification d'un etudaint< </title>
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
                                    <h2 class="title">Modification d'un étudiant</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Accueil</a></li>
                                
                                        <li class="active">Modification d'un étudiant</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Information de l'étudiant</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Effectué!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">
<?php 

$sql = "SELECT etudiant.nom,etudiant.prenom,etudiant.sexe,etudiant.date,etudiant.lieu from etudiant where etudiant.id='1'";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>

    <div class="container col-md-6 col-md-offset-3 space">
        <div class="panel panel-info">
            <div class="panel-heading">
                Inscription des étudiants
            </div>
            <div class="panel-body">                    
                     <div class="form-group">
                        <label class="control-label">Nom</label>
                        <input type="text" name="nom" class="form-control"  value="<?php echo htmlentities($result->nom)?>" >  
                     </div>
                     <div class="form-group">
                        <label class="control-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control"  value="<?php echo htmlentities($result->prenom)?>" >   
                     </div>
                     <div class="form-group">
                        <label class="control-label">sexe</label>
                        <select id="sexe" class="form-control" name="sexe" required  value="<?php echo htmlentities($result->sexe)?>" >
                            <option value="" selected>
                                Votre sexe
                            </option>
                              <option > Masculin</option>
                              <option>Feminin</option>
                          </select>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Date</label>
                        <input type="date" name="date" class="form-control"  value="<?php echo htmlentities($result->date)?>" >
                     </div>
                     <div class="form-group">
                        <label class="control-label">Lieu de naisance</label>
                        <input type="text" name="lieu" class="form-control"  value="<?php echo htmlentities($result->lieu)?>" >
                     </div>   
                                                  
<?php  }} ?>
                                                    
                                                   <button class="btn btn-primary"type="submit" style="background-color: blue;" name="valider">
                    Modifier
                </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>
