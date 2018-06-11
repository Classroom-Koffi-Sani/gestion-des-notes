<?php
include'../include/bdd.php';
if(isset($_POST['Nom'])&&$_POST['Nom']!=""&&isset($_POST['Prenom'])&&$_POST['Prenom']!=""&&isset($_POST['Sex'])&&$_POST['Sex']!=""&&isset($_POST['Date'])&&$_POST['Date']!=""&&isset($_POST['lieu'])&&$_POST['lieu']!="")
{

$requete=$bdd->prepare("INSERT INTO etudiant (nom,prenom,date,lieu,niveau,filiere,sex) VALUES (?,?,?,?,?,?,?)");
$requete->execute( array($_POST['Nom'],$_POST['Prenom'],$_POST['Date'],$_POST['lieu'],$_POST['niveau'],$_POST['filiere'],$_POST['Sex']));
$requete->CloseCursor();
$_POST['Nom']="";$_POST['Prenom']="";$_POST['Sex']="";$_POST['lieu']="";
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
	$page="inscription"; 

include '../include/header.php';

 ?>

<div style="margin : 0 30%;">
	<h1 ><center>Remplire le formulaire</center></h1>
	<form action="./" method="post">
		<table width="100%">
			<tr>
				<td>
					<label for="Nom">Nom</label>
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="Nom" id="Nom" class="form-control" placeholder="nom">
				</td>
			</tr>

			<tr>
				<td>
					<label for="Prenom">Prenom</label>
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="Prenom" id="Prenom" class="form-control" placeholder="Prenom">
				</td>
			</tr>

			<tr>
				<td>
					<label for="Sex">Sex</label>
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="Sex" id="Sex" class="form-control" placeholder="Sex">
				</td>
			</tr>
			<tr>
				<td>
					<label for="Date">Date de naissance</label>
				</td>
			</tr>

			<tr>
				<td>
					<input type="Date" name="Date" id="Date" class="form-control" placeholder="Date">
				</td>
			</tr>
			<tr>
				<td>
					<label for="lieu">Lieu de naissance</label>
				</td>
			</tr>

			<tr>
				<td>
					<input type="lieu" name="lieu" id="lieu" class="form-control" placeholder="lieu">
				</td>
			</tr>
			<tr>
				<td>
					<label for="niveau">niveau</label>  <label style="margin-left: 220px;" for="niveau">filieres</label>
				</td>
			</tr>

			<tr>
				<td>
					<select style="padding: 5px;border-radius: 4px;width: 48%; " name="filiere"> 
						<option>license 1</option><option>license 2</option><option>Master 1</option><option>Master 2</option><option>Doctorat </option><option>Masto  1</option>
					</select>
					<select style=" padding: 5px;border-radius: 4px;width: 48%;" name="niveau"> 
						<option>IRT</option><option>CCA</option><option>CCA-BF</option><option>SSR</option><option>MI </option><option> MT</option>
					</select>
				</td>
			</tr>
		</table>
		<br>
		<br>
		<div class="text-center"> <button type="submit" class="btn btn-primary btn-sm"> Envoyé</button></div>
	</form>
	
</div>






<br>
		<br>
 <?php 
 include '../include/footer.php';
  ?>

</body>
</html>