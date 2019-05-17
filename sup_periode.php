<?php
	$bdd = new PDO("mysql:host=localhost;dbname=t_transport", "root", "");
	$sup = $bdd->prepare("DELETE FROM t_periode WHERE id_periode=:id_new");
	$sup->bindValue('id_new', $_GET['id'], PDO::PARAM_INT);
	$sup->execute();
	header('location: liste_periode.php');
?>