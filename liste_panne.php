<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$req = $bdd->query("SELECT * FROM t_panne");
	$liste = $req->fetchAll();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>LISTE DES PANNES</title>
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
			<h3>LA LISTE DE MES DIFFERENTS PANNES</h3>
			<table>
				<tr>
					<th>ID</th>
					<th>TYPE</th>
					<th>MOTIF</th>
					<th>MONTANT</th>
					<th>VEHICULE</th>
					<th colspan="2">ACTION</th>
				</tr>

				<?php foreach($liste As $affiche) { ?>
				<tr>
					<td style="background-color: white;"><?php echo $affiche['id_panne']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['id_type']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['motif_panne']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['montant_panne']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['id_vehicule']; ?></td>
					<td style="background-color: white;"><a href="sup_panne.php?id=<?php echo $affiche['id_panne'] ?>">Supprimer</a></td>
					<td style="background-color: white;"><a href="modif_panne.php?id=<?php echo $affiche['id_panne'] ?>">Modifier</a></td>
				</tr>
				<?php } ?>
			</table>
		</center>
	</body>
</html>