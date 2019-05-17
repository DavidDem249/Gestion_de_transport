<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$select = $bdd->query("SELECT * FROM t_depense");
	$liste = $select->fetchAll();

	$req = $bdd->prepare("SELECT SUM(montant_depense) As prix_total FROM t_depense");
	$req->execute();
	$som = $req->fetch();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>LES DEPENSES FAITES</title>
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
			<h3>LA LISTE DES DEPENSE FAITES</h3>
			<table>
				<tr>
					<th>ID</th>
					<th>MOTIF</th>
					<th>MONTANT</th>
					<th>DATE</th>
					<th colspan="2">ACTION</th>
				</tr>

				<?php foreach($liste As $affiche) { ?>
				<tr>
					<td style="background-color: white;"><?php echo $affiche['id_depense']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['motif_depense']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['montant_depense']; ?>
					</td>
					<td style="background-color: white;"><?php echo $affiche['date_depense']; ?></td>
					<td style="background-color: white;"><a href="sup_depense.php?id=<?php echo $affiche['id_depense'] ?>">Supprimer</a></td>
					<td style="background-color: white;"><a href="modif_depense.php?id=<?php echo $affiche['id_depense'] ?>">Modifier</a></td>
				</tr>
				<?php } ?>
				<tr>
					<td></td>
					<td align="right" style="background-color: white;">Somme totale:</td>
					<td style="background-color: white;">
						<?php echo $som['prix_total']; ?>
					</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</center>
	</body>
</html>

