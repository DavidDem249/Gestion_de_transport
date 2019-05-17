<?php 
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$sel1 = $bdd->prepare("SELECT * FROM t_panne");
	$sel1->execute();
	$inf1 = $sel1->fetchAll();

	$sel2 = $bdd->prepare("SELECT * FROM t_panne");
	$sel2->execute();
	$inf2 = $sel2->fetchAll();

	if(isset($_POST['date1']) And isset($_POST['date2']))
	{
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];

		$req = $bdd->prepare("SELECT * FROM t_panne, t_vehicule, t_typepanne WHERE t_vehicule.id_vehicule = t_panne.id_vehicule AND t_typepanne.id_type = t_panne.id_type AND date_panne 
			BETWEEN '".$date1."' AND '".$date2."' ");

		$req->execute();
		$nombre = $req->fetchAll();
	}

 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Liste des des pannes</title>
		<meta charset="UTF-8" />
		<link href="" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<center>
			<h2>LISTE DES PANNES ENTRE DEUX DATES</h2>
			<form method="POST" action="" >
				<table>
					<tr>
						<th>
							<label for="date1">DATE DEBUT</label>
						</th>
						<td>
							<select name="date1">
								<?php foreach($inf1 As $resul1) :?>
									<option value="<?php echo $resul1['date_panne']; ?>">
										<?php echo $resul1['date_panne']; ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label for="date2">DATE FIN</label>
						</th>
						<td>
							<select name="date2">
								<?php foreach($inf2 As $resul2): ?>
									<option value="<?php echo $resul2['date_panne'] ?>">
										<?php echo $resul2['date_panne'] ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="submit" name="envoyer" value="Valider" /></td>
					</tr>
				</table>
			</form>

			<?php if(isset($nombre) And $nombre > 0){ ?>
				<table>
					<tr>
						<th>CODE PANNE</th>
						<th>TYPE VEHICULE</th>
						<th>MONTANT PANNE</th>
						<th>MOTIF PANNE</th>
						<th>DATE PANNE</th>
						<th>VEHICULE</th>
					</tr>
					<?php foreach($nombre As $affiche): ?>
						<tr>
							<td><?php echo $affiche['id_panne']; ?></td>
							<td><?php echo $affiche['libele']; ?></td>
							<td><?php echo $affiche['montant_panne']; ?></td>
							<td><?php echo $affiche['motif_panne']; ?></td>
							<td><?php echo $affiche['date_panne']; ?></td>
							<td><?php echo $affiche['marque']; ?> <?php echo $affiche['immatriculation']; ?></td>
						</tr>
					<?php endforeach ?>
				</table>
				<?php
					}
					else
					{
						echo "Il n y'a aucune pannes entre les dates indiquées";
					}
				 ?>
		</center>
	</body>
</html>