<?php

session_start();

$PAGENAME = "HOTEL Acceuil";

// Includes & Requires 
require_once('includes/partials/header.php');
require('serveur_db.php');

?>


<!-- Bar de navigation  -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Hôtel Telhô</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Chambres</a>
        </li>
        <?php
        if(isset($_SESSION['connecte']) && $_SESSION['connecte']) {
            echo '
            <li class="nav-item">
                <a class="nav-link" href="mes_reservations.php">Mes Réservations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
            </li>
            ';
        } else {
            echo '
            <li class="nav-item">
                <a class="nav-link" href="connexion.php">Connexion</a>
            </li>
            ';
        }
        ?>
        </ul>
    </div>
</nav>



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