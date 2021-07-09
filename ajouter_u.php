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
    $login=$_POST['login']; 
    $password=$_POST['password'];
    $contact = $_POST['contact'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    
    $sql="INSERT INTO  user(nom,prenom,sexe,date_naissance,lieu_de_naissance,email,login,password,contact,role) VALUES(:nom,:prenom,:sexe,:date_naissance,:lieu_de_naissance,:email,:login,:password,:contact,:role)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':nom',$nom,PDO::PARAM_STR);
    $query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
    $query->bindParam(':sexe',$sexe,PDO::PARAM_STR);
    $query->bindParam(':date_naissance',$date,PDO::PARAM_STR);
    $query->bindParam(':lieu_de_naissance',$lieu,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':login',$login,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':contact',$contact,PDO::PARAM_STR);
    $query->bindParam(':role',$role,PDO::PARAM_STR);
    $query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Utilisateur enregistré avec success!!!";
}
else 
{
$error="Enregistrement echouer. S'il vous plaît essayer encore !!!";
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Enregistrement d'un utilisateur </title>
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
                                        <form class="form-horizontal" method="POST">
    <div class="container col-md-6 col-md-offset-3 space">
        <div class="panel panel-info">
            <div class="panel-heading">
                Création d'un nouvel utilisateur
            </div>
            <div class="panel-body">
                    
                     <div class="form-group">
                        <label class="control-label">Nom</label>
                        <input type="text" name="nom" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label class="control-label">sexe</label>
                        <select id="sexe" class="form-control" name="sexe" required>
                           
                              <option value="Masculin" > Masculin</option>
                              <option value="Feminin" >Feminin</option>
                          </select>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Date de naissance</label>
                        <input type="date" name="date" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Lieu de naisance</label>
                        <input type="text" name="lieu" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Login</label>
                        <input type="text" name="login" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Contact</label>
                        <input type="text" name="contact" class="form-control" required>
                     </div>
                    
                                        <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputEmail4">Role : </label>
                       <select class="form-control"id="role" name="role"  required>
                            <option value="2" selected>
                                Comptabilité
                            </option>
                            <option value="1" selected>
                                Administrateur
                            </option>
                            <option value="3" selected>
                                Sécretariat
                            </option>
                            <option value="4" selected>
                                Gestionnaire de Formation
                            </option>
                        

                        </select>
                
                    </div>
               
                </div>
              
                      <button class="btn btn-primary" type="submit" style="background-color: blue;" name="valider">
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
