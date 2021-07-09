

<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT * FROM user WHERE login=:uname and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];

$_SESSION['user'] = $results[0];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>
 

<link href="theme/styles.css" rel="stylesheet">
<link href="theme/style.css" rel="stylesheet">
        

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<style type="text/css">
    body {
        background-image: url(img/az.jpg);
        color:black; 
       background-color:white;
       background-size: cover;
       width: 100%;
       margin: 0%;
       padding: 6%;
       height: 100%; 
       position:relative;
   }
   header {
    background : black;
   }


</style>
<body>
    <br><br><br>    
        
            <div class="login-panel panel panel-default">
                <div class="box" style="height: 420px;">
                        <?php
if (isset($_GET['error']))
{
        echo '<div class="alert bg-danger" role="alert" style="width: 100%;
    height: 50px;">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> le nom ou le mot de passe est incorrecte! <a  class="pull-right" aria-hidden="true"></a>
        </div>' ;

}?>

  
  <div id="header">
  <h1 id="logintoregister" style="color: black;">Se Connecter</h1>
  </div> 
   <form enctype="multipart/form-data" method="POST">
    <div class="group">      
      <input class="inputMaterial" type="text" name="username" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Utilisateur</label>
    </div>
        <div class="group">      
      <input class="inputMaterial" type="password" name="password" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Mot de passe</label>
    </div>
    <button type="submit" name="login" class="btn  btn-block" style="background-color: blue; color: #fff;">Connexion</button>
  </form>
</div>
</body>

</html>

