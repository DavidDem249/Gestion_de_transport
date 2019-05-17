<!DOCTYPE html>
<html>
	<head>
		<title>Page d'acceuil </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
	</head>

	<body>
		<nav>
	    	<ul>
				<li class="menu-vehicule"><a href="#">Vehicule</a>
					<ul class="sous-menu">
						<li><a href="form_vehicule.php">Inserer nouveaux vehicule</a></li>
						<li><a href="liste_vehicule.php">Voir la liste des vehicules existants</a></li>
					</ul>
				</li>
				<li class="menu-chauffeur"><a href="#">Chauffeur</a>
					<ul class="sous-menu">
						<li><a href="form_chauffeur.php">Inscription nouveau chauffeur</a></li>
						<li><a href="liste_chauffeur.php">Voir la liste des chauffeurs</a></li>
					</ul>
				</li>
				<li class="menu-versement"><a href="#">Versement</a>
					<ul class="sous-menu">
						<li><a href="form_versement.php">Faire un versement</a></li>
						<li><a href="liste_versement.php">Voir les versements</a></li>
						<li><a href="liste_versement_par_chauffeur.php">versements en fonction des chauffeurs</a></li>
						<li><a href="liste_versement_entre_deux_dates.php">Liste des versement entre deux date</a></li>
					</ul>
				</li>
				<li class="menu-depense"><a href="#">Depenses</a>
					<ul class="sous-menu">
						<li>
							<a href="form_depense.php">Ajouter nouvelle dépense</a>
						</li>
						<li>
							<a href="liste_depense.php">Voir la liste des dépenses</a>
						</li>
						<li>
							<a href="liste_des_depenses_entre_deux_dates.php">Liste des depenses entre deux dates</a>
						</li>
					</ul>
				</li>
				<li class="menu-periode"><a href="#">Periode</a>
					<ul class="sous-menu">
						<li>
							<a href="form_periode.php">Attribution d'une nouvelle periode</a>
						</li>
						<li>
							<a href="liste_periode.php">Voir la liste des periodes</a>
						</li>
					</ul>
				<li class="menu-panne"><a href="#">Pannes</a>
					<ul class="sous-menu">
						<li><a href="form_panne.php">Renseignés les pannes</a></li>
						<li><a href="liste_panne.php">Voir la liste des pannes</a></li>
						<li><a href="liste_panne_par_vehicule.php">Afficher les pannes en fonction des vehicules</a></li>
						<li><a href="liste_des_pannes_entre_deux_dates.php">Afficher les pannes entre deux dates</a></li>
					</ul>
				</li>
				<li class="menu-affecter"><a href="#">Affectation</a>
					<ul class="sous-menu">
						<li><a href="form_affecter.php">Attribution</a></li>
						<li><a href="liste_affecter.php">Voir la liste affectation</a></li>
					</ul>
				</li>
				<li class="menu-contact"><a href="#">Contact</a>
					<ul class="sous-menu">
						<li><a href="../ContactFrom_v12/contact.php">Nous contactés</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<section>
			<div class="titre">
				<h1><center><span style="font-size:110px;color:pink;font-family:Harlow Solid;">A</span><font style="color:green;">VEC LE NUMERIQUE, LA GESTION DEVIENT ENCORE PLUS FACILE</font></center></h1>
				<span><font style="font-size:100px;font-family:Lucida Calligraphy;color:green;">G</font><font style="color:white;">ESTION DES<font style="font-size:100px;font-family:Lucida Calligraphy;color:green;">T</font>RANSPORTS</font></span>
			</div>
			<img src="../images/v.jpg" height="500" width="100%" />
		</section>
	</body>
</html>