<?php
	include('menu.php');
?>
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport","root","");

	$req_chauf = $bdd->prepare("SELECT * FROM t_chauffeur");
	$req_chauf->execute();
	$inf = $req_chauf->fetchAll();

	$req_per = $bdd->prepare("SELECT * FROM t_periode");
	$req_per->execute();
	$infor = $req_per->fetchAll();

	$req_veh = $bdd->prepare("SELECT * FROM t_vehicule");
	$req_veh->execute();
	$inform = $req_veh->fetchAll();

	if(isset($_POST) && !empty($_POST))
	{
		$req = $bdd->prepare("INSERT INTO t_affecter VALUES(NULL,:date_aff,:periode,:chauf,:veh)");
		$req->bindValue(':date_aff',$_POST['date_affecter'],PDO::PARAM_STR);
		$req->bindValue(':periode',$_POST['id_periode'],PDO::PARAM_STR);
		$req->bindValue(':chauf',$_POST['id_chauffeur'],PDO::PARAM_STR);
		$req->bindValue(':veh',$_POST['id_vehicule'],PDO::PARAM_STR);
		$req->execute();
			//}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Affectation</title>
		<link href="../style/style_ens.css" rel="stylesheet" />
	</head>
	<body>
		<h2>FORMULAIRE POUR L'AFFECTATION</h2>
		<center>
			<form method="POST" action="#" enctype="multipart/form-data">
				<table>
					<!-- <tr>
						<td>
							<label>ID* : </label>
						</td>
						<td>
							<input type="text" name="id_chauffeur" placeholder="" />
						</td>
		   			</tr> -->
					<tr>
						<td>
							<label>DATE* : </label>
						</td>
						<td>
							<input type="date" name="date_affecter" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>PERIODE* : </label>
						</td>
						<td>
							<select name="id_periode">
								<?php foreach($infor As $res) :?>
									<option value="<?php echo $res['id_periode'] ?>">
										<?php echo "De ".$res['date_fin']; ?>
										<?php echo " à ".$res['date_debut']; ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>CHAUFFEUR* : </label>
						</td>
						<td>
							<select name="id_chauffeur">
								<?php foreach($inf As $resu) :?>
									<option value="<?php echo $resu['id_chauffeur']; ?>">
										<?php echo $resu['nom_chauffeur']; ?>
										<?php echo $resu['prenom_chauffeur'];?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>VEHICULE* : </label>
						</td>
						<td>
							<select name="id_vehicule">
								<?php foreach($inform As $resul) :?>
									<option value="<?php echo $resul['id_periode'] ?>">
										<?php echo $resul['marque']; ?>
										<?php echo $resul['immatriculation']; ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<!--<td>
							<label>CHAUFFEUR* : </label>
						</td>
						<td>
							<select name="id_chauffeur" >
								<?php 
									foreach($inf As $info): ?>
									<option value="<?php echo $info['id_chauffeur']; ?>">
										<?php echo $info['nom_chauffeur']; ?>
										<?php echo $info['prenom_chauffeur']; ?>
									</option>
								<?php endforeach ?>
							</select>
						</td>-->
					</tr>
					<tr>
						<td style="text-align: right;"><input type="submit" name="envoyer" value="Envoyer" /></td>
					</tr>
				</table>
			</form>
			<table><br /><br />
				<tr>
					<td style="background-color: green;color:white;" > Voir la <a href="liste_affecter.php" style="color:yellow;">Liste</a></td>
				</tr>
			</table>
		</center>
	</body>
</html>
