
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
?>

<?php


if(isset($_POST['btn']))
{

  if(empty($_POST['filiere']) || empty($_POST['libelle']))
 {
  
echo '<div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Un champ est vide !<a  class="pull-right" aria-hidden="true"></a>
        </div>';  

        
 }else
 {


      
  $sql2 = 'INSERT INTO filiere VALUES ("","'.$_POST['filiere'].'", "'.$_POST['libelle'].'")'; 
 
 $dbh->exec($sql2);        
 
echo '<div class="alert bg-success" role="alert">
          <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> La filière a été enrégistrée ! <a href="#" class="pull-right"></a>
        </div>'; 
 } 
}






?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Enregistrement d'une filière</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
            <link rel="stylesheet" href="fonts/font-awesome.min.css">
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
                                    <h2 class="title">Enregistrement d'une filière</h2>
                                
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
                Enregistrement d'une filière
            </div>
            <div class="panel-body">
                    
                <div class="form-group">
                        <label class="control-label">Nom filiere</label>
                        <input type="text" name="filiere" class="form-control" placeholder="nom filiere">
                     </div>
                     <div class="form-group">
                        <label class="control-label">Code filiere</label>
                        <input type="text" name="libelle" class="form-control">
                     </div>
   
 
          
                      <button class="btn btn-primary"type="submit" style="background-color: blue;" name="btn"><span class="glyphicon glyphicon-log-in"></span>
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
 </div>	
</body>
</html>

	