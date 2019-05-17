<?php 
	include('menu.php');
?>
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport","root","");
	if(isset($_POST['inserer']))
	{
		//Insertion de fichiers(photos)
		if(isset($_FILES['photo_chauffeur']) and $_FILES['photo_chauffeur']['error']==0)
		{
			$nom_fichier = $_FILES['photo_chauffeur']['name'];
			$chemin_temporaire = $_FILES['photo_chauffeur']['tmp_name'];
			$chemin_definitif = "../photo_chauffeur/".$nom_fichier;
			$fichier = move_uploaded_file($chemin_temporaire,$chemin_definitif);
   			//if(!empty($nom_chauffeur))
   			//{
			$req = $bdd->prepare("INSERT INTO t_chauffeur VALUES(NULL,:nom,:prenom,:permis,:contact,:photo,:nationalite)");
			$req->bindValue(':nom',$_POST['nom_chauffeur'],PDO::PARAM_STR);
			$req->bindValue(':prenom',$_POST['prenom_chauffeur'],PDO::PARAM_STR);
			$req->bindValue(':permis',$_POST['permis_chauffeur'],PDO::PARAM_STR);
			$req->bindValue(':contact',$_POST['contact_chauffeur'],PDO::PARAM_STR);
			$req->bindValue(':photo',$nom_fichier,PDO::PARAM_STR);
			$req->bindValue(':nationalite',$_POST['nationalite_chauffeur'],PDO::PARAM_STR);
			$req->execute();
			//}+
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inscription chauffeur</title>
		<link href="../style/style_ens.css" rel="stylesheet" />
	</head>
	<body>
		<h2>INSCRIPTION D'UN NOUVEAU CHAUFFEUR</h2>
		<center>
			<form method="POST" action="#" enctype="multipart/form-data">
				<table>.
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
							<label>NOM* : </label>
						</td>
						<td>
							<input type="text" name="nom_chauffeur" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>PRENOM* : </label>
						</td>
						<td>
							<input type="text" name="prenom_chauffeur" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>PERMIS* : </label>
						</td>
						<td>
							<input type="text" name="permis_chauffeur" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>CONTACT* : </label>
						</td>
						<td>
							<input type="text" name="contact_chauffeur" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>PHOTO* : </label>
						</td>
						<td>
							<input type="file" name="photo_chauffeur" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>NATIONALITE* : </label>
						</td>
						<td>
							<select name="nationalite_chauffeur">
								<option value="">Votre nationalité</option>
								<option value="Ivoirien">Ivoirienne</option>
								<option value="Malienne">Malienne</option>
								<option value="Guinéenne">Guinéenne</option>
								<option value="Somalienne">Somalienne</option>
								<option value="Nigerienne">Nigerienne</option>
								<option value="Tanzanienne">Tanzanienne</option>
								<option value="Marocaine">Marocaine</option>
								<option value="Algerienne">Algerienne</option>
								<option value="Mauritanienne">Mauritanienne</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;"><input type="submit" name="inserer" value="Inserer" /></td>
					</tr>
				</table>
			</form>
			<table><br /><br />
				<tr>
					<td style="background-color: green;color:white;" > Si vous êtes déjà inscrit cliquer sur <a href="liste_chauffeur.php" style="color:yellow;">LISTE DES CHAUFFEURS</a></td>
				</tr>
			</table>
		</center>
	</body>
</html>
