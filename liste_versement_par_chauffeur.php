<?php
//LISTE DES VERSEMENT PAR CHAUFFEUR AVEC LA PROJECTION
	//Requête de selection
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$sel = $bdd->prepare("SELECT * FROM t_chauffeur");
	$sel->execute();
	$inf = $sel->fetchAll();
	//Rêque de PROJECTION et de la JOINTURE
	if(isset($_POST['id_chauffeur']))
	{
		$id_chauffeur = $_POST['id_chauffeur'];
		$pr_jt = $bdd->prepare("SELECT * FROM t_versement, t_chauffeur WHERE t_chauffeur.id_chauffeur = t_versement.id_chauffeur
								AND t_versement.id_chauffeur='".$id_chauffeur."' ");
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
		<h2>LISTE DES VERSEMENTS PAR CHAUFFEUR</h2>
		<form method="POST" action="#">
			<table>
				<tr>
					<td>
						<label>CHAUFFEUR(*) : </label>
					</td>
					<td>
						<select name="id_chauffeur">
							<?php
								foreach($inf As $rep): ?>
								<option value="<?php echo $rep['id_chauffeur'] ?>">
									<?php echo $rep['nom_chauffeur']; ?>
									<?php echo $rep['prenom_chauffeur']; ?>
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
			if(isset($info1) and $info1>0 and $info>-1) 
			{
		 ?>
				<table>
					<tr>
						<th>CODE VERSEMENT</th>
						<th>MONTANT FIXE</th>
						<th>MONTANT VERSEMENT</th>
						<th>MONTANT RESTANT</th>
						<th>DATE VERSEMENT</th>
						<th>CHAUFFEUR</th>
						<th>PHOTO</th>
					</tr>
					<?php foreach($info As $reponse) : ?>
						<tr>
							<td><?php echo $reponse['id_versement'];?></td>
							<td><?php echo $reponse['montant_fixe'];?></td>
							<td><?php echo $reponse['montant_versement'];?></td>
							<td><?php echo $reponse['montant_restant'];?></td>
							<td><?php echo $reponse['date_versement'];?></td>
							<td><?php echo $reponse['nom_chauffeur'];?> <?php echo $reponse['prenom_chauffeur'];?></td></td>
						</tr>
					<?php endforeach; ?>
				</table>
		<?php
		 }
		else{echo "Le chauffeur n'a pas d'information dans la base de données" ;} ?>
	</body>
</html>
