
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{




        if(isset($_POST['btn']))
        {
            $session=$_POST['session']; 
            $annee=$_POST['annee']; 
    
            $idfiliere = $_POST['filiere'];
            $sql1 = "SELECT * FROM module WHERE idfiliere='$idfiliere' "; 
            $result1=$dbh->query($sql1);  

           $data1=$result1->fetchAll(PDO::FETCH_ASSOC);
            
           $sql = "SELECT * FROM etudiaknt WHERE session='$session' AND annee='$annee "; 
           $result=$dbh->query($sql);  

            $data=$result->fetchAll(PDO::FETCH_ASSOC);
    
            $_SESSION['etudiant'] = $data;
            $_SESSION['module'] = $data1;








        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
        $msg="Etudiant enregistré avec success";
        
        
       // header("location:note_two.php");
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
        <title>Liste des notes</title>
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
                                    <h2 class="title">Liste des notes</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Accueil</a></li>
                                        <li> Notes</li>
                                        <li class="active">Liste des notes</li>
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
 <form  action="liste_inscrit.php"   method="POST">
         
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
                  
                       <select id="session" name="session" required class="form-control" required>
                            <option value="" selected >
                                Choisir une session
                            </option>
                            
                  <option value="octobre" >Octobre (cours du jour)</option> 
                  <option value="janvier" >Janvier (cours du soir)</option>
                  <option value="avril" >Avril (cours du jour)</option>
                  <option value="juillet" >Juillet (cours du soir)</option>
                  
                      
                            
                        </select>
                     </div>


                     <div class="form-group col-lg-6">
                       <select id="annee" name="annee" required class="form-control" required>
                            <option value="" selected >
                                Année 
                            </option>
                            
                  <option value="2021" > 2021 </option> 
                  <option value="2022" > 2022 </option>
                  <option value="2023" >2023</option>
                  <option value="2024" >2024</option>
                  <option value="2025" >2025</option>
                  <option value="2026" >2026</option>
                  <option value="2027" >2027</option>
                  <option value="2028" >2028</option>
                  <option value="2029" >2029</option>
                      
                            
                        </select>
                     </div>
               
                       
                                
             
               <div class="form-group col-lg-6" >
                        <div class="input-group" >
                        <div class="input-group-addon"><i class="glyphicon glyphicon-book"></i></div>
                          <select class="form-control"id="filiere" name="filiere" required>
                            <option value="" selected>
                                Votre filière
                            </option>

                              <?php
                                      $sql = "SELECT * FROM filiere "; 
                                        $result=$dbh->query($sql);  

                                       $data=$result->fetchAll(PDO::FETCH_ASSOC);
                                      foreach ($data as $donne){
                                      
                                              
                                                       ?>
                                       <option value="<?php echo $donne['nofiliere'] ?>" ><?php echo $donne['nofiliere']; ?></option>
                                     
                                       
                                          <?php

                                                          
                                             }?>
                        </select>

                        </div>  

               </div> 




              </div>
          <br>
                 

                  
                        
            </div>
            
            <div class="form-footer">
                 <button type="submit" class="btn btn-info" name="btn">
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

