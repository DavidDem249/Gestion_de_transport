<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$sup = $bdd->prepare("DELETE FROM t_vehicule WHERE id_vehicule=:id_new");
	$sup->bindValue('id_new',$_GET['id'],PDO::PARAM_INT);
	$sup->execute();
	header('location:liste_vehicule.php');
?>