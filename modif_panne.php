<?php 
	include('menu.php');
?>
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	//On selection la table vehicule de sorte à avoir la clé etrangère du vehicule
	$sel = $bdd->prepare("SELECT * FROM t_vehicule, t_typepanne");
	$sel->execute();
	$inf = $sel->fetchAll();


	if(isset($_GET['id']))
	{
		$req = $bdd->prepare("SELECT * FROM t_panne WHERE id_panne=:id_new");
		$req->bindValue('id_new',$_GET['id'],PDO::PARAM_INT);
		$req->execute();
		$req_select = $req->fetch();
	}

	if(isset($_POST))
	{
		if(!empty($_POST))
		{
			$req = $bdd->prepare("UPDATE t_panne SET type_panne=:type,montant_panne=:montant,motif_panne=:motif,date_panne=:dat,id_vehicule=:id_veh WHERE id_panne=:id_new");
			$req->bindValue(':type',$_POST['type_panne'],PDO::PARAM_INT);
			$req->bindValue(':montant',$_POST['montant_panne'],PDO::PARAM_STR);
			$req->bindValue(':motif',$_POST['motif_panne'],PDO::PARAM_STR);
			$req->bindValue(':dat',$_POST['date_panne'],PDO::PARAM_STR);
			$req->bindValue(':id_veh',$_POST['id_vehicule'],PDO::PARAM_INT);
			$req->execute();
			header('location: liste_panne.php');
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inscription</title>
		<link href="../style/style_ens.css" rel="stylesheet" />
	</head>
	<body style="background-color: rgba(79,223,216);">
		<h2>RENSEIGNEMENT DES PANNES</h2>
		<center>
			<form method="POST" action="#" onctype="multipart/form-data">
				<table>
					<!-- <tr>
						<td>
							<label>ID* : </label>
						</td>
						<td>
							<input type="text" name="id_panne" placeholder="" />
						</td>
		   			</tr> -->
					<tr>
						<td>
							<label>TYPE* : </label>
						</td>
						<td>
							<select name="id_type">
								<?php foreach($inf As $resul): ?>
									<option value="<?php echo $resul['id_panne']; ?>">
										<?php echo $resul['libele']; ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>MONTANT* : </label>
						</td>
						<td>
							<input type="text" name="montant_panne" value="<?php echo $req_select['montant_panne']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>MOTIF* : </label>
						</td>
						<td>
							<textarea name="motif_panne" ><?php echo $req_select['motif_panne']; ?></textarea> 
						</td>
					</tr>
					<tr>
						<td>
							<label>DATE* : </label>
						</td>
						<td>
							<input type="text" name="date_panne" value="<?php echo $req_select['date_panne']; ?>"/>
						</td>
					</tr>
					<tr>
						<td>
							<label>VEHICULE* : </label>
						</td>
						<td>
							<select name="id_vehicule">
								<?php foreach($inf As $resul): ?>
									<option value="<?php echo $resul['id_vehicule'];?>">
										<?php echo $resul['marque'];?>
										<?php echo $resul['immatriculation'];?>
									</option>
								<?php endforeach; ?>
							</select>
						</td>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;"><input type="submit" name="inserer" value="Inserer" /></td>
					</tr>
				</table>
			</form>
			<table><br /><br />
				<tr>
					<td style="background-color: green;color:white;" > Vous pouvez voir toutes les différentes pannes en cliquant sur la  <a href="liste_panne.php" style="color:yellow;">LISTE DES PANNES</a></td>
				</tr>
			</table>
		</center>
	</body>
</html>
