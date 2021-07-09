
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{





        if(isset($_POST['btn1']))
        {
            
            $note = $_POST['discipline'];
            $etudiant_id = $_POST['etudiant'];
            $module_id = $_POST['module'];
            
    $sql="INSERT INTO  discipline(discipline,etudiant_id,module_id) VALUES(:discipline,:etudiant_id,:module_id)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':discipline',$note,PDO::PARAM_STR);
    $query->bindParam(':etudiant_id',$etudiant_id,PDO::PARAM_STR);
    $query->bindParam(':module_id',$module_id,PDO::PARAM_STR);
    $query->execute();

/*


      $note = $_POST['note'];
            $etudiant_id = $_POST['etudiant'];
            $module_id = $_POST['module'];
            
    $sql="INSERT INTO  note (note,etudiant_id,module_id) VALUES('$note','$etudiant_id','$module_id'";
  

  $dbh->exec($sql);
  


*/


        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
        $msg="Etudiant enregistré avec success";
        
      
        header("location:liste_discipline.php?id=".$module_id);
        }
        else 
        {
        $error="Enregistrement echouer. S'il vous plaît essayer encore";
        }
        
        }



$session=$_POST['session']; 
$annee=$_POST['annee']; 

$idfiliere = $_POST['filiere'];
$sql1 = "SELECT * FROM module WHERE idfiliere='$idfiliere' "; 
$result1=$dbh->query($sql1);  




$data1=$result1->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT id, nom , prenom FROM etudiant WHERE session='$session' AND annee='$annee' "; 
$result=$dbh->query($sql);  

$data=$result->fetchAll(PDO::FETCH_ASSOC);







?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Discipline</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="assets/signup-form.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Discipline</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Accueil</a></li>
                                        <li> Etudiant</li>
                                        <li class="active">Discipline</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Voir Info Note</h5>
                                                </div>
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>effectué!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="panel-body p-20">
 <form   action="discipline_two.php" method="POST">
         
         <div class="form-header " >
            <h3 class="form-title"><i class="fa fa-user"></i> Enrégistrement d'une note </h3>
                      
         <div class="pull-right">
             <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
         </div>
                      
         </div>
                  
         <div class="form-body">
         
              <div class="alert alert-info" id="message" style="display:none;">
              Non Enregistrer
              </div>

              <div class="row ">   
                 
              <div class="form-group col-lg-6">
                       <select id="discipline" name="discipline" required class="form-control" required>
                            <option value="" selected >
                                Année 
                            </option>
                            
                  <option value="Exclusion" > Exclusion </option> 
                  <option value="Avertissement" > Avertissement </option>
                  <option value="Blame" >Blame</option>
                  
                            
                        </select>
                     </div>
               
                     <div class="form-group col-lg-6" >
                        <div class="input-group" >
                        <div class="input-group-addon"><i class="glyphicon glyphicon-book"></i></div>
                          <select class="form-control"id="module" name="module" required>
                            <option value="" selected>
                                module
                            </option>

                              <?php
                                    
                                 
                                      foreach ($data1 as $donne1){
                                      
                                              
                                                       ?>
                                       <option value="<?php echo $donne1['Num_Module'] ?>" ><?php echo $donne1['Nom_Module']; ?></option>
                                     
                                       
                                          <?php

                                                    
                                             }?>
                        </select>

                        </div>  

               </div> 
               
                       
                                
             
               <div class="form-group col-lg-6" >
                        <div class="input-group" >
                        <div class="input-group-addon"><i class="glyphicon glyphicon-book"></i></div>
                          <select class="form-control"id="etudiant" name="etudiant" required>
                            <option value="" selected>
                                Etdiant
                            </option>

                              <?php
                                      
                                 
                                      foreach ($data as $donne){
                                      
                                              
                                                       ?>
                                       <option value="<?php echo $donne['id'] ?>" ><?php echo $donne['nom']." ".$donne['prenom']; ?></option>
                                     
                                       
                                          <?php

                                                          
                                             }?>
                        </select>

                        </div>  

               </div> 




              </div>
          <br>
                 

                  
                        
            </div>
            
            <div class="form-footer">
                 <button type="submit" class="btn btn-info" name="btn1">
                 <span class="glyphicon glyphicon-log-in"></span> Suivant
                 </button>
            </div>


            </form>
            

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>
<?php } ?>
