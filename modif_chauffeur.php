
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	//Selection des informations du formulaire
	if(isset($_GET['id']))
	{
		$recup = $bdd->prepare("SELECT * FROM t_chauffeur WHERE id_chauffeur=:id_new");
		$recup->bindValue('id_new',$_GET['id'],PDO::PARAM_INT);
		$recup->execute();
		$info = $recup->fetch();
	}
	//modification des informations
	if(isset($_POST['nom_chauffeur']))
	{
		if(!empty($_POST['id_chauffeur']))
		{
			$modif = $bdd->prepare("UPDATE t_chauffeur SET nom_chauffeur=:nom,prenom_chauffeur=:prenom,permis_chauffeur=:permis,contact_chauffeur=:contact,photo_chauffeur=:photo,nationalite_chauffeur=:nationalite WHERE id_chauffeur=:id_new");
			$modif->bindValue('id_new',$_POST['id_chauffeur'],PDO::PARAM_INT);
			$modif->bindValue('nom',$_POST['nom_chauffeur'],PDO::PARAM_STR);
			$modif->bindValue('prenom',$_POST['prenom_chauffeur'],PDO::PARAM_STR);
			$modif->bindValue('permis',$_POST['permis_chauffeur'],PDO::PARAM_STR);
			$modif->bindValue('contact',$_POST['contact_chauffeur'],PDO::PARAM_STR);
			$modif->bindValue('photo',$_POST['photo_chauffeur'],PDO::PARAM_STR);
			$modif->bindValue('nationalite',$_POST['nationalite_chauffeur'],PDO::PARAM_STR);
			$modif->execute();
			header('location: liste_chauffeur.php');
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
		<h2>MODIFIER LES DONNEES D'UN CHAUFFEUR</h2>
		<center>
			<form method="POST" action="#" onctype="multipart/form-data">
				<table>
					<tr>
						<td>
							<label>ID* : </label>
						</td>
						<td>
							<input type="hidden" name="id_chauffeur" value="<?php echo $info['id_chauffeur']  ?>" placeholder="" />
						</td>
		   			</tr>
					<tr>
						<td>
							<label>NOM* : </label>
						</td>
						<td>
							<input type="text" name="nom_chauffeur" value="<?php echo $info['nom_chauffeur']  ?>" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>PRENOM* : </label>
						</td>
						<td>
							<input type="text" name="prenom_chauffeur" value="<?php echo $info['prenom_chauffeur']  ?>" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>PERMIS* : </label>
						</td>
						<td>
							<input type="text" name="permis_chauffeur" value="<?php echo $info['permis_chauffeur']  ?>" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>CONTACT* : </label>
						</td>
						<td>
							<input type="text" name="contact_chauffeur" value="<?php echo $info['contact_chauffeur']  ?>" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>PHOTO* : </label>
						</td>
						<td>
							<input type="file" name="photo_chauffeur" value="<?php echo $info['photo_chauffeur'] ?> placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>NATIONALITE* : </label>
						</td>
						<td>
							<select name="nationalite_chauffeur" value="<?php echo $info['nationalite_chauffeur'] ?>">
								<option value="">Votre nationalite</option>
								<option value="Ivoirienne">Ivoirienne</option>
								<option value="Malienne">Malienne</option>
								<option value="Bourkinabé">Bourkinabé</option>
								<option value="Congolaise">Congolaise</option>
								<option value="Nigerienne">Nigerienne</option>
								<option value="Tanzanienne">Tanzanienne</option>
								<option value="Marocaine">Marocaine</option>
								<option value="Algerienne">Algerienne</option>
								<option value="Mauritanienne">Mauritanienne</option>
							</select>
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