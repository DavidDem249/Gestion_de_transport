
<?php 
	include('menu.php');
?>
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	if(isset($_POST) && !empty($_POST))
	{
		$req = $bdd->prepare("INSERT INTO t_vehicule VALUES(NULL,:marq,:imm)");
		$req->bindValue(':marq',$_POST['marque'],PDO::PARAM_STR);
		$req->bindValue(':imm',$_POST['immatriculation'],PDO::PARAM_STR);
		$req->execute();
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Information Vehicule</title>
		<link href="../style/style_ens.css" rel="stylesheet" />
	</head>

	<body>
		<h2>INFORMATION DU VEHICULE</h2>
		<center>
			<form method="POST" action="#">
				<table>
					<!-- <tr>
						<td>
							<label>ID* : </label>
						</td>
						<td>
							<input type="text" name="id_vehicule" placeholder="" />
						</td>
		   			</tr> -->
					<tr>
						<td>
							<label>MARQUE* : </label>
						</td>
						<td>
							<input type="text" name="marque" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>IMMATRICULATION* : </label>
						</td>
						<td>
							<input type="text" name="immatriculation" placeholder="" />
						</td>
					</tr>
					<tr>
						<td style="text-align: right;"><input type="submit" name="inserer" value="Envoyer" /></td>
					</tr>
				</table>
				<table><br /><br />
				<tr>
					<td style="background-color: green;color:white;" > Pour voir tous les vehicules cliquer sur <a href="liste_vehicule.php" style="color:yellow;">Liste</a></td>
				</tr>
			</table>
			</form>
		</center>
	</body>
</html>
