<?php 

include'../include/bdd.php';
$requete=$bdd->prepare("SELECT COUNT(*) nbnote from matiere" );
$requete->execute();

if(isset($_POST['Nom'])&&isset($_POST['Prenom']))
{
	$query0=("SELECT *  from etudiant where nom=? and prenom=?");
$requete0=$bdd->prepare($query0);
$requete0->execute(array($_POST['Nom'],$_POST['Prenom']));

$free=$requete0->rowCount($query0);
if ($free==0) {
	header('Location: ./');
	# code...
}
}

if ( $nbnote= $requete->fetch()) {


	$nben= $nbnote['nbnote'];

	# code...
}

for ($i=1; $i <=$nben ; $i++) {

	if (isset($_POST['note'.$i])&&!empty($_POST['note'.$i])&&isset($_POST['Nom'])&&isset($_POST['Prenom'])&&isset($_POST['matiere'.$i])) 
	{
		$requete1=$bdd->prepare("INSERT INTO note (etudiant,matiere,note) VALUES (?,?,?)");
		$requete1->execute(array($_POST['Nom']." ".$_POST['Prenom'],$_POST['matiere'.$i],$_POST['note'.$i]));
		
	}
	# code...
}
 
$requete1->closeCursor();


?>