<?php 
	include('menu.php');
?>
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	//On selection la table vehicule de sorte à avoir la clé etrangère du vehicule
	$req_vehi = $bdd->prepare("SELECT * FROM t_vehicule");
	$req_vehi->execute();
	$info = $req_vehi->fetchAll();

	$req_type = $bdd->prepare("SELECT * FROM t_typepanne");
	$req_type->execute();
	$inf = $req_type->fetchAll();
	
	if(isset($_POST['id_type']))
	{
		if(!empty($_POST['id_type']))
		{
			$req = $bdd->prepare("INSERT INTO t_panne VALUES(NULL,:type,:montant,:motif,NOW(),:id_veh)");
			$req->bindValue(':type',$_POST['id_type'],PDO::PARAM_INT);
			$req->bindValue(':montant',$_POST['montant_panne'],PDO::PARAM_STR);
			$req->bindValue(':motif',$_POST['motif_panne'],PDO::PARAM_STR);
			//$req->bindValue(':dat',$_POST['date_panne'],PDO::PARAM_STR);
			$req->bindValue(':id_veh',$_POST['id_vehicule'],PDO::PARAM_STR);
			$req->execute();
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
								<?php foreach($inf As $res):?>
									<option value="<?php echo $res['id_type']; ?>">
										<?php echo $res['libele']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>MONTANT* : </label>
						</td>
						<td>
							<input type="text" name="montant_panne" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>MOTIF* : </label>
						</td>
						<td>
							<textarea name="motif_panne" placeholder="Donner le motif de la panne" ></textarea> 
						</td>
					</tr>
					<!-- <tr>
						<td>
							<label>DATE* : </label>
						</td>
						<td>
							<input type="date" name="date_panne" placeholder="" />
						</td>
					</tr> -->
					<tr>
						<td>
							<label>VEHICULE* : </label>
						</td>
						<td>
							<select name="id_vehicule">
								<?php foreach($info As $resul): ?>
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
