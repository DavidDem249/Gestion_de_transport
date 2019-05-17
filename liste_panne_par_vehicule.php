<?php
//LISTE DES VERSEMENT PAR CHAUFFEUR AVEC LA PROJECTION
	//Requête de selection
	
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$sel = $bdd->prepare("SELECT * FROM t_vehicule");
	$sel->execute();
	$inf = $sel->fetchAll();
	
	//Rêque de PROJECTION et de la JOINTURE
	if(isset($_POST['id_vehicule']))
	{
		$id_vehicule = $_POST['id_vehicule'];
		$pr_jt = $bdd->prepare("SELECT * FROM t_panne,t_typepanne,t_vehicule
								 WHERE  t_typepanne.id_type = t_panne.id_type
								 AND t_vehicule.id_vehicule = t_panne.id_vehicule
								 AND t_panne.id_vehicule='".$id_vehicule."' 
								 ");

		$pr_jt->execute();
		$info1 = $pr_jt->fetch();

		$info = $pr_jt->fetchAll();
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Liste</title>
		<style>
			body
			{
				background: grey;
			}
			h2
			{
				background-color: rgba(100, 240, 120);
				font-family: Felix Titling;
			}
		</style>
	</head>


	<body>
		<h2>LISTE DES PANNES PAR VEHICULE</h2>
		<form method="POST" action="#">
			<table>
				<tr>
					<td>
						<label>VEHICULE(*) : </label>
					</td>
					<td>
						<select name="id_vehicule">
							<?php
								foreach($inf As $rep): ?>
								<option value="<?php echo $rep['id_vehicule'] ?>">
									<?php echo $rep['marque']; ?>
									<?php echo $rep['immatriculation']; ?>
								</option>
							<?php endforeach ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="Rechercher" /></td>
				</tr>
			</table>
		</form>
		<?php 
			if(isset($info1) and $info1>0 and $info >= 1) 
			{
		 ?>
				<table>
					<tr>
						<th>CODE PANNE</th>
						<th>TYPE PANNE</th>
						<th>MONTANT PANNE</th>
						<th>MOTIF PANNE</th>
						<th>DATE PANNE</th>
						<th>CODE VEHICULE</th>
					</tr>
					<?php foreach($info As $reponse) : ?>
						<tr>
							<td><?php echo $reponse['id_panne'];?></td>
							<td><?php echo $reponse['libele'];?></td>
							<td><?php echo $reponse['montant_panne'];?></td>
							<td><?php echo $reponse['motif_panne'];?></td>
							<td><?php echo $reponse['date_panne'];?></td>
							<td><?php echo $reponse['marque'];?> <?php echo $reponse['immatriculation'];?></td></td>
						</tr>
					<?php endforeach; ?>
				</table>
		<?php
		 }
		else{echo "Il n y'a aucune panne sur cette vehicule" ;} ?>
	</body>
</html>
