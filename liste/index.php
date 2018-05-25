<?php
include'../include/bdd.php';
$requete=$bdd->prepare("SELECT * from etudiant" );
$requete->execute();


?>
  <!DOCTYPE html>
<html>
<head>
	
	<title>Gestion</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome-4.7.0/css/font-awesome.min.css" />
</head>
<body>
	<?php
	$page="liste"; 

include '../include/header.php';

 ?>

<table class="table">
	<tr class="success">
		<td>
			nom
		</td>
		<td>
			prenom
		</td>
		<td>
			sex
		</td>
		<td>
			date
		</td>
		<td>
			lieu
		</td>
		<td>
			niveau
		</td>
		<td>
			filiere
		</td>
	</tr>
	<?php 

	while (  $data=$requete->  fetch()) { ?>

		<tr>
		<td>
			<?php  echo $data['nom'];?>
		</td>
		<td>
			<?php  echo $data['prenom'];?>
		</td>
		<td>
			<?php  echo $data['sex'];?>
		</td>
		<td>
			<?php  echo $data['date'];?>
		</td>
		<td>
			<?php  echo $data['lieu'];?>
		</td>
		<td>
			<?php  echo $data['niveau'];?>
		</td>
		<td>
			<?php  echo $data['filiere'];?>
		</td>
	</tr>
	 <?php
		
	}
	?> 
</table>
 <?php 
 include '../include/footer.php';
  ?>

</body>
</html>