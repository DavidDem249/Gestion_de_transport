<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$select = $bdd->query("SELECT * FROM t_periode");
	$liste = $select->fetchAll();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PERIODES FAITES</title>
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
			<h3>PERIODE DEJA RENSEIGNEES</h3>
			<table>
				<tr>
					<th>ID</th>
					<th>DATE DEBUT</th>
					<th>DATE FIN</th>
					<th colspan="2">ACTION</th>
				</tr>

				<?php foreach($liste As $affiche) { ?>
				<tr>
					<td style="background-color: white;"><?php echo $affiche['id_periode']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['date_debut']; ?></td>
					<td style="background-color: white;"><?php echo $affiche['date_fin']; ?></td>
					<td style="background-color: white;"><a href="sup_periode.php?id=<?php echo $affiche['id_periode'] ?>">Supprimer</a></td>
					<td style="background-color: white;"><a href="modif_periode.php?id=<?php echo $affiche['id_periode'] ?>">Modifier</a></td>
				</tr>
				<?php } ?>
			</table>
		</center>
	</body>
</html>