
<?php 
	include('menu.php');
?>
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport","root","");

	$req_chauf = $bdd->prepare("SELECT * FROM t_chauffeur");
	$req_chauf->execute();
	$inf = $req_chauf->fetchAll();

	if(isset($_POST) && !empty($_POST))
	{
		$req = $bdd->prepare("INSERT INTO t_versement VALUES(NULL,:m_fixe,:m_vers,:m_res,:date_vers,:chauf)");
		$req->bindValue(':m_fixe',$_POST['montant_fixe'],PDO::PARAM_STR);
		$req->bindValue(':m_vers',$_POST['montant_versement'],PDO::PARAM_STR);
		$req->bindValue(':m_res',$_POST['montant_restant'],PDO::PARAM_STR);
		$req->bindValue(':date_vers',$_POST['date_versement'],PDO::PARAM_STR);
		$req->bindValue(':chauf',$_POST['id_chauffeur'],PDO::PARAM_INT);
		$req->execute();
			//}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mon versement</title>
		<link href="../style/style_ens.css" rel="stylesheet" />
	</head>
	<body>
		<h2>FORMULAIRE POUR LE VERSEMENT</h2>
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
							<label>MONTANT FIXE* : </label>
						</td>
						<td>
							<input type="text" name="montant_fixe" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>MONTANT VERSEMENT* : </label>
						</td>
						<td>
							<input type="text" name="montant_versement" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>MONTANT RESTANT* : </label>
						</td>
						<td>
							<input type="text" name="montant_restant" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>DATE VERSEMENT* : </label>
						</td>
						<td>
							<input type="date" name="date_versement" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
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
						</td>
					</tr>
					<tr>
						<td style="text-align: right;"><input type="submit" name="envoyer" value="Envoyer" /></td>
					</tr>
				</table>
			</form>
			<table><br /><br />
				<tr>
					<td style="background-color: green;color:white;" > Pour voir tous les versements cliquer sur <a href="liste_versement.php" style="color:yellow;">Liste</a></td>
				</tr>
			</table>
		</center>
	</body>
</html>
0