<?php
include'../include/bdd.php';
$requete=$bdd->prepare("SELECT nom,id from matiere" );
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
	$page="enregistrement"; 

include '../include/header.php';
?>
<center><h1>Enregistrement de notes</h1></center>
<div class="container-fluid">
	<div class="row">
		<form action="traitement.php" method="POST">
			<div class="col-xs-3">

			
				
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
								<label for="niveau">niveau</label>  <label style="margin-left: 120px;" for="niveau">filieres</label>
							</td>
						</tr>

						<tr>
							<td>
								<select style="padding: 5px;border-radius: 4px;width: 48%;" name="niveau"> 
									<option>license 1</option><option>license 2</option><option>Master 1</option><option>Master 2</option><option>Doctorat </option><option>Masto  1</option>
								</select>
								<select style=" padding: 5px;border-radius: 4px;width: 48%;" name="filieres"> 
									<option>IRT</option><option>CCA</option><option>CCA-BF</option><option>SSR</option><option>MI </option><option> MT</option>
								</select>
							</td>
						</tr>
					</table>
					<br>
					<br>
				
					
		</div>
		<div class="col-xs-9">
			<?php 
				$i=1;
			?>
			<table width="80%" class="table-bordered tabnote">
				<tr>
					<td>
						Matiere
					</td>
					<td>
						note
					</td>
				</tr>
				<?php 
				while ( $data=$requete->  fetch()) {

					?>
					<tr>
					<td>
						<select name="matiere<?php echo $i; ?>">
							<option><?php echo $data['nom']; ?></option>
						</select>						
					</td>
					<td>
						<input type="number" name="note<?php echo($i);  ?>" max="20" min="0">
					</td>
				</tr>
				<?php
				$i++;
					
				}





				?>
				
				
			</table>
			<br>
			<button type="sbmit" class="btn btn-primary  btn-sm"> Valide</button>



			<a href="../ajouteM/" class="btn btn-primary btn-sm"> Ajoute une Matiere</a>
			</div>
	</form>
	</div>
</div>
 <?php 
 include '../include/footer.php';
  ?>



</body>
</html>