<?php 
	include('menu.php');

	$bdd = new PDO('mysql:host=localhost;dbname=bd_transport', 'root', '');

	$req1 = $bdd->prepare("SELECT * FROM t_versement");
	$req1->execute();
	$inf = $req1->fetchAll();

	$req2 = $bdd->prepare("SELECT * FROM t_versement");
	$req2->execute();
	$info = $req2->fetchAll();

	if(isset($_POST['date1']) AND isset($_POST['date2']))
	{
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];


		$req = $bdd->prepare("SELECT * FROM t_versement, t_chauffeur 
							  WHERE t_chauffeur.id_chauffeur=t_versement.id_chauffeur
							   AND date_versement
							   BETWEEN '".$date1."' AND '".$date2."' ");
		$req->execute();
		$nombre = $req->fetchAll();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Liste versement entre deux dates</title>
		<meta charset="utf-8" />
		<style>
			body{
				
			}
			table > tr > td > select {
				padding: 100px;
			}
		</style>
		<link rel="stylesheet" href="style.css" />
	</head>

	<body>
		<center>
			<h1>LISTE DES VERSEMENTS ENTRE DEUX DATES</h1>
			
			<form method="POST" action="#">
				<table>
					<tr>
						<td>
							<label for='date_deb'>DATE DEBUT</label>
						</td>
						<td>
							<select name="date1">
								<?php foreach($inf AS $aff) :?>
									<option value="<?php echo $aff['date_versement']; ?>">
										<?php echo $aff['date_versement']; ?>
									</option>
								<?php endforeach ?>
							</select> 
						</td>
					</tr>
					<tr>
						<td>
							<label for='date_fin'>DATE FIN</label>
						</td>
						<td>
							<select name="date2">
								<?php foreach($info AS $affi) :?>
									<option value="<?php echo $affi['date_versement']; ?>">
										<?php echo $affi['date_versement'] ;?>
									</option>
								<?php endforeach ?>
							</select> 
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<input type="submit" value='Rechercher' name='recherche' />
						</td>
					</tr>
				</table>
			</form>

			<?php 

			if(isset($nombre) and $nombre>0 ){ ?>

				<table>
					<tr>
						<th>CODE VERSEMENT</th>
						<th>MONTANT FIXE</th>
						<th>MONTANT VERSE</th>
						<th>MONTANT RESTANT</th>
						<th>DATE VERSEMENT</th>
						<th>CODE CHAUFFEUR</th>
					</tr>
					<?php foreach($nombre As $nombre) { ?>
						<tr>
							<td><?php echo $nombre['id_versement'];  ?></td>
							<td><?php echo $nombre['montant_fixe'] ?></td>
							<td><?php echo $nombre['montant_versement'] ?></td>
							<td><?php echo $nombre['montant_restant'] ?></td>
							<td><?php echo $nombre['date_versement'] ?></td>
							<td><?php echo $nombre['nom_chauffeur'] ?> <?php echo $nombre['prenom_chauffeur'] ?></td>
						</tr>

					<?php } ?>

				</table>
				<?php 
					}
					else{
						echo "Vous n'avez aucun versement dans cette periode";
					}
				?>
		</center>
	</body>
</html>