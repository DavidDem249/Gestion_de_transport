<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$req = $bdd->prepare("SELECT * FROM t_affecter, t_chauffeur, t_vehicule, t_periode
		WHERE t_chauffeur.id_chauffeur=t_affecter.id_chauffeur AND t_vehicule.id_vehicule=t_affecter.id_vehicule AND t_periode.id_periode=t_affecter.id_periode");
	$req->execute();
	$liste = $req->fetchAll();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Affectation</title>
		<style>
			h3{
				color: yellow;
				font-size: 43px;
				font-family: verdana;
				background: green;
			}
			body{
				background-color: rgba(13,115,115);
				}
			table{
				border-collapse: collapse;
			}
			td, th{
				padding: 20px;

			}
			tr th{
				color:orange;
				background-color: rgba(118,10,15);
			}
		</style>

	</head>

	<body>
		<center>
			<h3>LA LISTE DE LA TABLE AFFECTEE</h3>
			<table>
				<tr>
					<th>NOM CHAUFFEUR</th>
					<th>DATE ATTRIBUTION</th>
					<th>DATE DEBUT PERIODE</th>
					<th>DATE FIN PERIODE</th>
					<th>CHAUFFEUR</th>
					<th>VEHICULE</th>
					<th colspan="2">ACTION</th>
				</tr>

				<?php foreach($liste As $affiche) { ?>
				<tr>
					<td style="background-color: white;"><?php echo $affiche['id_affecter']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['date_affecter']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['date_debut'];?></td>
					<td style="background-color: white;"><?php echo $affiche['date_fin'] ?></td>
					<td style="background-color: white;"><?php echo $affiche['nom_chauffeur'];?><?php echo $affiche['prenom_chauffeur'];?></td>
					<td style="background-color: white;"><?php echo $affiche['marque'];?><?php echo $affiche['immatriculation'];?></td>
					<td style="background-color: white;"><a href="sup_affecter.php?id=<?php echo $affiche['id_affecter'] ?>">Supprimer</a></td>
					<td style="background-color: white;"><a href="modif_affecter.php?id=<?php echo $affiche['id_affecter'] ?>">Modifier</a></td>
				</tr>
				<?php } ?>
			</table>
		</center>
	</body>