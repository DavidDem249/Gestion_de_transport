
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	//Selection des informations du formulaire
	if(isset($_GET['id']))
	{
		$recup = $bdd->prepare("SELECT * FROM t_depense WHERE id_depense=:id_new");
		$recup->bindValue('id_new',$_GET['id'],PDO::PARAM_INT);
		$recup->execute();
		$info = $recup->fetch();
	}
	//modification des informations
	if(isset($_POST['id_depense']))
	{
		if(!empty($_POST['id_depense']))
		{
			$modif = $bdd->prepare("UPDATE t_depense SET motif_depense=:motif,montant_depense=:montant,date_depense=:date_dep WHERE id_depense=:id_new");
			$modif->bindValue('id_new',$_POST['id_depense'],PDO::PARAM_INT);
			$modif->bindValue('motif',$_POST['motif_depense'],PDO::PARAM_STR);
			$modif->bindValue('montant',$_POST['montant_depense'],PDO::PARAM_STR);
			$modif->bindValue('date_dep',$_POST['date_depense'],PDO::PARAM_STR);
			$modif->execute();
			header('location: liste_depense.php');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Modification</title>
		<link href="../style/style_ens.css" rel="stylesheet" />
	</head>
	<body>
		<h2>MODIFIER LA DEPENSE</h2>
		<center>
			<form method="POST" action="#" onctype="multipart/form-data">
				<table>
					<tr>
						<td>
							<label>ID* : </label>
						</td>
						<td>
							<input type="hidden" name="id_depense" value="<?php echo $info['id_depense']  ?>" placeholder="" />
						</td>
		   			</tr>
					<tr>
						<td>
							<label>MOTIF* : </label>
						</td>
						<td>
							<input type="text" name="motif_depense" value="<?php echo $info['motif_depense']  ?>" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>MONTANT* : </label>
						</td>
						<td>
							<input type="text" name="montant_depense" value="<?php echo $info['montant_depense']  ?>" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>DATE* : </label>
						</td>
						<td>
							<input type="text" name="date_depense" value="<?php echo $info['date_depense']  ?>" placeholder="" />
						</td>
					</tr>
					<tr>
						<td style="text-align: right;"><input type="submit" name="modifier" value="modifier" /></td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>