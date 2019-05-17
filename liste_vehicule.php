<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$select = $bdd->query("SELECT * FROM t_vehicule");
	$liste = $select->fetchAll();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Liste vehicules</title>
		<style>
			h3{
				color: yellow;
				font-size: 50px;
				font-family: verdana;
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
			<h3>LA LISTE DE MES VEHICULES</h3>
			<table>
				<tr>
					<th>ID</th>
					<th>MARQUE</th>
					<th>IMMATRICULATION</th>
					<th colspan="2">ACTION</th>
				</tr>

				<?php foreach($liste As $affiche) { ?>
				<tr>
					<td style="background-color: white;"><?php echo $affiche['id_vehicule']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['marque']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['immatriculation']; ?></td>
					<td style="background-color: white;"><a href="sup_vehicule.php?id=<?php echo $affiche['id_vehicule'] ?>">Supprimer</a></td>
					<td style="background-color: white;"><a href="modif_vehicule.php?id=<?php echo $affiche['id_vehicule'] ?>">Modifier</a></td>
				</tr>
				<?php } ?>
			</table>
		</center>
	</body>
</html>