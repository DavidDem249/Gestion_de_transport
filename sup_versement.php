<?php
	$bdd = new PDO("mysql:host=localhost;dbname=bd_transport", "root", "");
	$sup = $bdd->prepare("DELETE FROM t_versement WHERE id_versement=:id_new");
	$sup->bindValue('id_new',$_GET['id'],PDO::PARAM_INT);
	$sup->execute();
	header('location:liste_versement.php');
?>