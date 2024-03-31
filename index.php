<?php

session_start();

$PAGENAME = "HOTEL Acceuil";

// Includes & Requires 
require_once('includes/partials/header.php');
require('serveur_db.php');

?>


<div class="container mt-5">
	<h1 class="text-center mb-4">Chambres d'Hôtel Disponibles</h1>
	<div class="row">

		<!-- Chambre Standard -->
		<div class="col-md-4 mb-4">
			<div class="card h-100">
				<img src="includes/img/chambre_standard.jpg" class="card-img-top" alt="Chambre Standard">
				<div class="card-body">
					<h5 class="card-title text-center">Chambre Standard</h5>
					<p class="card-text">Une chambre standard confortable pour votre séjour.</p>
					<ul class="list-group list-group-flush">

					<?php
						$sql = "SELECT * FROM chambre WHERE nomChambre = 'Standard'";
						$result = $connexion->query($sql);

						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$idChambre = $row['idChambre'];
							$nomChambre = $row['nomChambre'];
							$nbPlaces = $row['nbPlaces'];
							$prixChambre = $row['prixChambre'];

							echo "<li class='list-group-item'>Nombre de places : $nbPlaces</li>";
							echo "<li class='list-group-item'>Prix : $$prixChambre/nuit</li>";
						} else {
							echo "<li class='list-group-item'>Aucune information trouvée</li>";
						}
					?>

					</ul>
				</div>
				<div class="card-footer">
					<a href="chambre.php?chambre=Standard&nbPlaces=<?php echo $nbPlaces?>&prixChambre=<?php echo $prixChambre?>" class="btn btn-outline-dark btn-block">Réserver</a>
				</div>
			</div>
		</div>

		<!-- Chambre Familiale -->
		<div class="col-md-4 mb-4">
			<div class="card h-100">
				<img src="includes/img/chambre_familiale.jpg" class="card-img-top" alt="Chambre Familiale">
				<div class="card-body">
					<h5 class="card-title text-center">Chambre Familiale</h5>
					<p class="card-text">Une chambre spacieuse pour toute la famille.</p>
					<ul class="list-group list-group-flush">

					<?php
						$sql = "SELECT * FROM chambre WHERE nomChambre = 'Familiale'";
						$result = $connexion->query($sql);

						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$idChambre = $row['idChambre'];
							$nomChambre = $row['nomChambre'];
							$nbPlaces = $row['nbPlaces'];
							$prixChambre = $row['prixChambre'];

							echo "<li class='list-group-item'>Nombre de places : $nbPlaces</li>";
							echo "<li class='list-group-item'>Prix : $$prixChambre/nuit</li>";
						} else {
							echo "<li class='list-group-item'>Aucune information trouvée</li>";
						}
					?>

					</ul>
				</div>
				<div class="card-footer">
					<a href="chambre.php?chambre=Familiale&nbPlaces=<?php echo $nbPlaces?>&prixChambre=<?php echo $prixChambre?>" class="btn btn-outline-dark btn-block">Réserver</a>
				</div>
			</div>
		</div>

		<!-- Chambre Luxueuse -->
		<div class="col-md-4 mb-4">
			<div class="card h-100">
				<img src="includes/img/chambre_luxueuse.jpg" class="card-img-top" alt="Chambre Luxueuse">
				<div class="card-body">
					<h5 class="card-title text-center">Chambre Luxueuse</h5>
					<p class="card-text">Une chambre de luxe pour une expérience inoubliable.</p>
					<ul class="list-group list-group-flush">

					<?php
						$sql = "SELECT * FROM chambre WHERE nomChambre = 'Luxueuse'";
						$result = $connexion->query($sql);

						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$idChambre = $row['idChambre'];
							$nomChambre = $row['nomChambre'];
							$nbPlaces = $row['nbPlaces'];
							$prixChambre = $row['prixChambre'];

							echo "<li class='list-group-item'>Nombre de places : $nbPlaces</li>";
							echo "<li class='list-group-item'>Prix : $$prixChambre/nuit</li>";
						} else {
							echo "<li class='list-group-item'>Aucune information trouvée</li>";
						}
					?>

					</ul>
				</div>
				<div class="card-footer">
					<a href="chambre.php?chambre=Luxueuse&nbPlaces=<?php echo $nbPlaces?>&prixChambre=<?php echo $prixChambre?>" class="btn btn-outline-dark btn-block">Réserver</a>
				</div>
			</div>
		</div>

	</div>
</div>
  
<a href="https://themeforest.net/user/ig_design/portfolio" class="link-to-portfolio hover-target" target="_blank"></a>
 

<?php include('includes/partials/footer.php') ?>