
<?php
include'../include/bdd.php';
if(isset($_POST['Nom'])&&$_POST['Nom']!="")
{

$requete=$bdd->prepare("INSERT INTO matiere (nom) VALUES (?)");
$requete->execute( array($_POST['Nom']));
$requete->CloseCursor();
$_POST['Nom']="";
}



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
	 

include '../include/header.php';

 ?>
<center>
	<form action="./" method="post">
<table>
			<tr>
				<td>
					<label for="Nom">Nom de la matiere </label>
				</td>
		

			
				<td>
					<input type="text" name="Nom" id="Nom" class="form-control" placeholder="nom">
				</td>
				<td>
					<div class="text-center"> <button type="submit" class="btn btn-primary btn-sm"> ajouté</button></div>
				</td>
			</tr>


</table>
</form>
</center>


 <?php 
 include '../include/footer.php';
  ?>

</body>
</html>