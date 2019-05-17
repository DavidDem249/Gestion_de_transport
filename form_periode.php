
<?php 
	include('menu.php');
?>
<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	if(isset($_POST['inserer']))
	{
		//if(!empty($_POST['id_periode']))
		//{
			$req = $bdd->prepare("INSERT INTO t_periode VALUES(NULL,:date_deb,:date_fin)");
			//$req->bindValue(':id',$_POST['id_pe'],PDO::PARAM_INT);
			$req->bindValue(':date_deb', $_POST['date_debut'], PDO::PARAM_STR);
			$req->bindValue(':date_fin', $_POST['date_fin'], PDO::PARAM_STR);
			//$req->bindValue(':date_dep',$_POST['date_depense'],PDO::PARAM_STR);
			$req->execute();
		//}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Page de periode travail</title>
		<link href="../style/style_ens.css" rel="stylesheet" />
	</head>
	<body>
		<h2>LA PERIODE DE TRAVAIL</h2>
		<center>
			<form method="POST" action="#" >
				<table>
					<!-- <tr>
						<td>
							<label>ID* : </label>
						</td>
						<td>
							<input type="text" name="id_periode" placeholder="" />
						</td>
		   			</tr> -->
		   			<tr>
						<td>
							<label>DATE DEBUT* : </label>
						</td>
						<td>
							<input type="date" name="date_debut" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>DATE FIN* : </label>
						</td>
						<td>
							<input type="date" name="date_fin" placeholder="" />
						</td>
					</tr>
					<tr>
						<td style="text-align: right;"><input type="submit" name="inserer" value="Envoyer" /></td>
					</tr>
				</table>
			</form>
			<table><br /><br />
				<tr>
					<td style="background-color: green;color:white;" >Pour voir La liste des periodes <a href="liste_periode.php" style="color:yellow;"> CLIQUER ICI </a></td>
				</tr>
			</table>
		</center>
	</body>
</html>
