<?php 
	include('menu.php');
?>
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	if(isset($_POST['montant_depense']))
	{
		if(!empty($_POST['montant_depense']))
		{
			$req = $bdd->prepare("INSERT INTO t_depense VALUES(NULL,:motif,:montant,:date_dep)");
			//$req->bindValue(':id',$_POST['id_depense'],PDO::PARAM_INT);
			$req->bindValue(':motif',$_POST['motif_depense'],PDO::PARAM_STR);
			$req->bindValue(':montant',$_POST['montant_depense'],PDO::PARAM_STR);
			$req->bindValue(':date_dep',$_POST['date_depense'],PDO::PARAM_STR);
			$req->execute();
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Page pour les depenses</title>
		<link href="../style/style_ens.css" rel="stylesheet" />
	</head>
	<body>
		<h2>RENSEIGNEMENT DE LA DEPENSE</h2>
		<center>
			<form method="POST" action="#" onctype="multipart/form-data">
				<table>
					<!-- <tr>
						<td>
							<label>ID* : </label>
						</td>
						<td>
							<input type="text" name="id_depense" placeholder="" />
						</td>
		   			</tr> -->
					<tr>
						<td>
							<label>MOTIF* : </label>
						</td>
						<td>
							<textarea name="motif_depense" ></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<label>MONTAN* : </label>
						</td>
						<td>
							<input type="text" name="montant_depense" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>DATE* : </label>
						</td>
						<td>
							<input type="date" name="date_depense" placeholder="" />
						</td>
					</tr>
					<tr>
						<td style="text-align: right;"><input type="submit" name="inserer" value="Envoyer" /></td>
					</tr>
				</table>
			</form>
			<table><br /><br />
				<tr>
					<td style="background-color: green;color:white;" >Pour voir la liste des depenses renseignés <a href="liste_depense.php" style="color:yellow;"> CLIQUER ICI </a></td>
				</tr>
			</table>
		</center>
	</body>
</html>
