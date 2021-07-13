<?php
	include('includes/config.php');

	$q1 = "DELETE FROM note WHERE note.id = '".$_GET['id']."'";
	$r1 = $dbh->query($q1);

    


	

    header("location:liste_note.php?id=".$_GET['m']);
?>