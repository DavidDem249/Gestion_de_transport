<?php
$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$sel1 = $bdd->prepare("SELECT * FROM t_depense");
	$sel1->execute();
	$inf1 = $sel1->fetchAll();

	$sel2 = $bdd->prepare("SELECT * FROM t_depense");
	$sel2->execute();
	$inf2 = $sel2->fetchAll();

	if(isset($_POST['date1']) And isset($_POST['date2']))
	{
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];

		$req = $bdd->prepare("SELECT * FROM t_depense WHERE date_depense 
			BETWEEN '".$date1."' AND '".$date2."' ");

		$req->execute();
		$nombre = $req->fetchAll();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Les depenses de cette periode</title>
		<meta charset="UTF-8" />
		<link href="" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<center>
			<h1>LISTE DES DES DEPENSES ENTRE DEUX DATES DONNEES</h1>
			<form method="POST" action="">
				<table>
					<tr>
						<th>
							<label for="date1">DATE DEBUT</label>
						</th>
						<td>
							<select name="date1">
								<?php foreach($inf1 As $resul1) :?>
									<option value="<?php echo $resul1['date_depense'];?>">
										<?php echo $resul1['date_depense']; ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label for="date1">DATE DEBUT</label>
						</th>
						<td>
							<select name="date2">
								<?php foreach($inf1 As $resul1) :?>
									<option value="<?php echo $resul1['date_depense'];?>">
										<?php echo $resul1['date_depense']; ?>
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
						<th>CODE DEPENSE</th>
						<th>MOTIF DEPENSE</th>
						<th>MONTANT DEPENSE</th>
						<th>DATE DEPENSE</th>
					</tr>
					<?php foreach($nombre As $affiche): ?>
						<tr>
							<td><?php echo $affiche['id_depense']; ?></td>
							<td><?php echo $affiche['motif_depense']; ?></td>
							<td><?php echo $affiche['montant_depense']; ?></td>
							<td><?php echo $affiche['date_depense']; ?></td>
						</tr>
					<?php endforeach ?>
				</table>
				<?php
					}
					else
					{
						echo "Il n y'a eu aucune depense entre les deux dates indiquées";
					}
				 ?>
		</center>
	</body>
</html>