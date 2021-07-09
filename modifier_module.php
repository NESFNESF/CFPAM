<?php
session_start();
error_reporting(0);
include('includes/config.php');


$id = $_GET['id'] ;



if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
?>


<?php





if(isset($_POST['btn']))
{

  if(empty($_POST['module']) and empty($_POST['filiere']))
 {


        
 }else
 {

  $filiere = $_POST['filiere'];
  $module = $_POST['module'];
  $temps = $_POST['temps'];

 
      

  $sql2 ="UPDATE module SET Nom_Module = '$module', idFiliere = '$filiere', temps = '$temps' WHERE module.Num_Module ='$id' ; ";
 $dbh->exec($sql2);
 
 $lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
  header("Location: module.php"); 
}
else 
{
$error="Echec de modification . S'il vous plaît essayer encore !!!";
}

}


 
}






?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Modification d'un module</title>
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
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
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
                                    <h2 class="title">modifier un module</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Accueil</a></li>
                                
                                        <li class="active">Modification</li>
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
                Ajouter module
            </div>
            <div class="panel-body">
                    
                  <div class="form-group" >
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></div>
                   <input name="module"   class="form-control" type="text" placeholder="module">
                   </div>
                   <span class="help-block" id="error"></span>
              </div>
              <div class="form-group" >
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></div>
                   <input name="temps"  class="form-control" type="number" placeholder="durrée du module">
                   </div>
                   <span class="help-block" id="error"></span>
              </div> 
                      <div class="form-group ">
                        <div class="input-group">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-book"></i></div>
                  <select class="form-control"id="filiere" name="filiere" required>
                            

                               <?php
                                      $sql = "SELECT * FROM filiere "; 
                                        $result=$dbh->query($sql);  

                                       $data=$result->fetchAll(PDO::FETCH_ASSOC);
                                      foreach ($data as $donne){
                                      
                                              
                                                       ?>
                                       <option value="<?php echo $donne['idFiliere']; ?>"  ><?php echo $donne['nofiliere']; ?></option>
                                     
                                       
                                          <?php

                                                          
                                             }?>
                        </select>

                        </div>  

               </div> 
                      <button class="btn btn-primary"type="submit" style="background-color: blue;" name="btn">
                    Enregistrer
                </button>
                <button class="btn btn-danger"type="reset">
                    Annuler
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

    </body>
</html>
<?PHP ?>
