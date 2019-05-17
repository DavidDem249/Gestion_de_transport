
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$select = $bdd->query("SELECT * FROM t_versement");
	$liste = $select->fetchAll();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>LISTE VERSEMENT</title>
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
			<h3>LA LISTE DES VERSEMENTS</h3>
			<table>
				<tr>
					<th>ID</th>
					<th>MONTANT FIXE</th>
					<th>MONTANT VERSEMENT</th>
					<th>MONTANT RESTANT</th>
					<th>DATE VERSEMENT</th>
					<th>CHAUFFEUR</th>
					<th colspan="2">ACTION</th>
				</tr>

				<?php foreach($liste As $affiche) { ?>
				<tr>
					<td style="background-color: white;"><?php echo $affiche['id_versement']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['montant_fixe']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['montant_versement']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['montant_restant']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['date_versement']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['id_chauffeur']; ?></td>
					<td style="background-color: white;"><a href="sup_versement.php?id=<?php echo $affiche['id_versement'] ?>">Supprimer</a></td>
					<td style="background-color: white;"><a href="modif_versement.php?id=<?php echo $affiche['id_versement'] ?>">Modifier</a></td>
				</tr>
				<?php } ?>
			</table>
		</center>
	</body>
</html>