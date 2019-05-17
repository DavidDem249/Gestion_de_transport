
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	//Selection des informations du formulaire
	if(isset($_GET['id']))
	{
		$recup = $bdd->prepare("SELECT * FROM t_periode WHERE id_periode=:id_new");
		$recup->bindValue('id_new',$_GET['id'],PDO::PARAM_INT);
		$recup->execute();
		$info = $recup->fetch();
	}
	//modification des informations
	if(isset($_POST['id_periode']))
	{
		if(!empty($_POST['id_periode']))
		{
			$modif = $bdd->prepare("UPDATE t_periode SET date_debut=:date_deb,date_fin=:date_fin WHERE id_periode=:id_new");
			$modif->bindValue('id_new',$_POST['id_periode'],PDO::PARAM_INT);
			$modif->bindValue('date_deb',$_POST['date_debut'],PDO::PARAM_STR);
			$modif->bindValue('date_fin',$_POST['date_fin'],PDO::PARAM_STR);
			$modif->execute();
			header('location: liste_periode.php');
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
							<input type="hidden" name="id_periode" value="<?php echo $info['id_periode']  ?>" placeholder="" />
						</td>
		   			</tr>
					<tr>
						<td>
							<label>DATE DEBUT* : </label>
						</td>
						<td>
							<input type="text" name="date_debut" value="<?php echo $info['date_debut']  ?>" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>DATE FIN* : </label>
						</td>
						<td>
							<input type="text" name="date_fin" value="<?php echo $info['date_fin']  ?>" placeholder="" />
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