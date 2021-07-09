<?php
	include('includes/config.php');

	$q1 = "DELETE FROM module WHERE Num_Module = '".$_GET['id']."'";
	$r1 = $dbh->query($q1);

    


	

	header('location:module.php');
?>