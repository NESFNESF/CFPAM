<?php
	include('includes/config.php');
	


	$q1 = "DELETE FROM user WHERE id = '".$_GET['id']."'";
	$r1 = $dbh->query($q1);

    


	

	header('location:afficheruser.php');
?>