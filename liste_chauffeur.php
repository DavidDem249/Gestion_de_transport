
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$select = $bdd->query("SELECT * FROM t_chauffeur");
	$liste = $select->fetchAll();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>LISTE DES CHAUFFEURS</title>
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
			<h3>LA LISTE DE MES DIFFERENTS CHAUFFEUR</h3>
			<table>
				<tr>
					<th>ID</th>
					<th>NOM</th>
					<th>PRENOM</th>
					<th>PERMIS</th>
					<th>CONTACT</th>
					<th>PHOTO</th>
					<th>NATIONALITE</th>
					<th>PHOTO</th>
					<th colspan="2">ACTION</th>
				</tr>

				<?php foreach($liste As $affiche) { ?>
				<tr>
					<td style="background-color: white;"><?php echo $affiche['id_chauffeur']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['nom_chauffeur']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['prenom_chauffeur']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['permis_chauffeur']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['contact_chauffeur']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['photo_chauffeur']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['nationalite_chauffeur']; ?></td>
					<td style="background-color: white;"><img src="../photo_chauffeur/<?php echo $affiche['photo_chauffeur']; ?>" width="50" height="50" /></td>
					<td style="background-color: white;"><a href="sup_chauffeur.php?id=<?php echo $affiche['id_chauffeur'] ?>">Supprimer</a></td>
					<td style="background-color: white;"><a href="modif_chauffeur.php?id=<?php echo $affiche['id_chauffeur'] ?>">Modifier</a></td>
				</tr>
				<?php } ?>
			</table>
		</center>
	</body>
</html>