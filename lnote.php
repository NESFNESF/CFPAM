<?php   session_start();

if(!isset($_SESSION['cnx']) or $_SESSION['cnx']==false )
{
  

  header('location:index.php');
}else{

  $_SESSION['module'] = $_GET['module'];
  
}


 
?>
<!DOCTYPE html>
<?php

 include('cnx.php');

?>
<html>
<head> 
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 
<?php include('note.php'); ?>
          
</div>
</body>
</html>