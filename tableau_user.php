
<!DOCTYPE html>
   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Enregistrement d'un etudaint< </title>
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
<html>
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default" style=" box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
					<div class="panel-heading">User</div>
					<div class="panel-body">
						<table data-toggle="table"   data-search="true"  data-pagination="true"  >
						    <thead>
						    <tr>
						                

						        <th  data-sortable="true" ><h3><center>Numéro user</center></h3></th>
						        <th   data-sortable="true"><h3><center>Nom user</center></h3></th>
						        <th data-sortable="true"><h3><center>Mot de pass user</center></h3></th>
						        <th data-sortable="true"><h3><center>Date de modification</center></h3></th>


							</tr>
						    </thead>
							<tbody>
							<?php 
							$q =  "select * from user where type like 'admin'";
							$r = $conn -> query($q) ;
							while ($c = $r -> fetch())
							{
							?>
							<tr>
							<td> 
							<?php echo $c['id'] ; ?>
							</td>
							<td> 
							<?php echo $c['Username']; ?>
							</td>
							<td> 
							<?php echo $c['Password'] ; ?>
							</td>
							<td> 
							<?php echo $c['updationDate'] ; ?>
							</td>
							
                            
							<td style = "text-align:center;">
							<?php 
						echo "<a href=\"modifier_user.php?id=".$c['id']."\" class=\"btn btn-warning\">Modifier</span>" ;
							?>
							</td>
					

						
							<td style = "text-align:center;"> 
							<?php 
			
	
			echo "<a href=\"supprimer_user.php?id=".$c['id']."\" class=\"btn btn-danger\">Supprimer</span>" ;
		
		
							?>
							</td>
							</tr>	
							<?php
							}
							?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>		
		<span><a href="ajouter_user.php" class="btn btn-info col-xs-6 col-sm-4 col-lg-2" >Ajouter utilisateur</a></span>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
	</html>