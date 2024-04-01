<?php

session_start();

if (isset($_SESSION['nom'])) {
    $nom = $_SESSION['nom'];
} else { $nom = ''; }

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else { $email = 'email'; }

if(isset($_GET['chambre'])){
    $chambre = $_GET['chambre'];
    $nbPlaces = $_GET['nbPlaces'];
    $prixChambre = $_GET['prixChambre'];
}


$PAGENAME = 'Chambre '.$chambre;

// Includes & Requires 
require_once('includes/partials/header.php');
require('serveur_db.php');
require('includes/function.php');


// Description et image pour chaque chambres
if(isset($_GET['chambre']) && $_GET['chambre'] === 'Standard') {
    $image = 'includes/img/chambre_standard.jpg';
    $description = "Bienvenue dans notre chambre standard, un espace confortable conçu pour votre séjour. Profitez de la tranquillité et du confort dans cet espace aménagé avec soin. Que vous voyagiez seul, en couple ou pour affaires, notre chambre standard vous offre le confort nécessaire pour une nuit reposante.
    <br>
    <br>
    Découvrez notre sélection de chambres élégantes et confortables, conçues pour répondre à tous vos besoins. De nos chambres standard aux chambres familiales spacieuses et luxueuses, nous avons l'option parfaite pour chaque type de voyageur. Chacune de nos chambres est équipée de commodités modernes et de touches de luxe pour assurer votre confort et votre satisfaction.
    <br>
    <br>
    Profitez de notre gamme d'installations et de services, y compris notre restaurant raffiné, notre centre de remise en forme bien équipé et notre service de conciergerie dévoué. Que vous souhaitiez vous détendre au bord de la piscine, explorer les attractions locales ou organiser une réunion d'affaires réussie, nous sommes là pour répondre à tous vos besoins.
    <br>
    <br>
    Au-delà de nos installations, nous sommes fiers de notre engagement envers un service exceptionnel et une hospitalité chaleureuse. Notre équipe dévouée est à votre disposition pour vous offrir une expérience personnalisée et répondre à toutes vos demandes. Quelle que soit la raison de votre visite, nous ferons tout notre possible pour rendre votre séjour inoubliable.";
} elseif(isset($_GET['chambre']) && $_GET['chambre'] === 'Familiale') {
    $image = 'includes/img/chambre_familiale.jpg';
    $description = "Bienvenue dans notre chambre familiale, un espace spacieux conçu pour accueillir toute votre famille. Avec suffisamment de place pour tous, cette chambre offre le confort et la commodité dont vous avez besoin pour passer des moments inoubliables en famille. Profitez de l'intimité et de la chaleur de notre chambre familiale lors de votre séjour.
    <br>
    <br>
    Découvrez notre sélection de chambres élégantes et confortables, conçues pour répondre à tous vos besoins. De nos chambres standard aux chambres familiales spacieuses et luxueuses, nous avons l'option parfaite pour chaque type de voyageur. Chacune de nos chambres est équipée de commodités modernes et de touches de luxe pour assurer votre confort et votre satisfaction.
    <br>
    <br>
    Profitez de notre gamme d'installations et de services, y compris notre restaurant raffiné, notre centre de remise en forme bien équipé et notre service de conciergerie dévoué. Que vous souhaitiez vous détendre au bord de la piscine, explorer les attractions locales ou organiser une réunion d'affaires réussie, nous sommes là pour répondre à tous vos besoins.
    <br>
    <br>
    Au-delà de nos installations, nous sommes fiers de notre engagement envers un service exceptionnel et une hospitalité chaleureuse. Notre équipe dévouée est à votre disposition pour vous offrir une expérience personnalisée et répondre à toutes vos demandes. Quelle que soit la raison de votre visite, nous ferons tout notre possible pour rendre votre séjour inoubliable.";
} elseif(isset($_GET['chambre']) && $_GET['chambre'] === 'Luxueuse') {
    $image = 'includes/img/chambre_luxueuse.jpg';
    $description = "Bienvenue dans notre chambre luxueuse, un havre de paix où le confort et l'élégance se rencontrent. Avec des équipements haut de gamme et des finitions raffinées, cette chambre offre une expérience de séjour exceptionnelle. Détendez-vous dans le luxe et laissez-vous dorloter dans notre chambre luxueuse pour une expérience inoubliable.
    <br>
    <br>
    Découvrez notre sélection de chambres élégantes et confortables, conçues pour répondre à tous vos besoins. De nos chambres standard aux chambres familiales spacieuses et luxueuses, nous avons l'option parfaite pour chaque type de voyageur. Chacune de nos chambres est équipée de commodités modernes et de touches de luxe pour assurer votre confort et votre satisfaction.
    <br>
    <br>
    Profitez de notre gamme d'installations et de services, y compris notre restaurant raffiné, notre centre de remise en forme bien équipé et notre service de conciergerie dévoué. Que vous souhaitiez vous détendre au bord de la piscine, explorer les attractions locales ou organiser une réunion d'affaires réussie, nous sommes là pour répondre à tous vos besoins.
    <br>
    <br>
    Au-delà de nos installations, nous sommes fiers de notre engagement envers un service exceptionnel et une hospitalité chaleureuse. Notre équipe dévouée est à votre disposition pour vous offrir une expérience personnalisée et répondre à toutes vos demandes. Quelle que soit la raison de votre visite, nous ferons tout notre possible pour rendre votre séjour inoubliable.";
} else {
    $image = 'assets/img/default.jpg';
    $description = "Bienvenue à l'Hôtel Telhô, un refuge de tranquillité et de confort au cœur de notre destination. Notre hôtel est l'endroit idéal pour les voyageurs en quête d'une expérience mémorable et relaxante. Que vous soyez ici pour affaires ou pour le plaisir, nous vous offrons un service impeccable et des installations de qualité pour rendre votre séjour aussi agréable que possible.
    <br>
    <br>
    Découvrez notre sélection de chambres élégantes et confortables, conçues pour répondre à tous vos besoins. De nos chambres standard aux chambres familiales spacieuses et luxueuses, nous avons l'option parfaite pour chaque type de voyageur. Chacune de nos chambres est équipée de commodités modernes et de touches de luxe pour assurer votre confort et votre satisfaction.
    <br>
    <br>
    Profitez de notre gamme d'installations et de services, y compris notre restaurant raffiné, notre centre de remise en forme bien équipé et notre service de conciergerie dévoué. Que vous souhaitiez vous détendre au bord de la piscine, explorer les attractions locales ou organiser une réunion d'affaires réussie, nous sommes là pour répondre à tous vos besoins.
    <br>
    <br>
    Au-delà de nos installations, nous sommes fiers de notre engagement envers un service exceptionnel et une hospitalité chaleureuse. Notre équipe dévouée est à votre disposition pour vous offrir une expérience personnalisée et répondre à toutes vos demandes. Quelle que soit la raison de votre visite, nous ferons tout notre possible pour rendre votre séjour inoubliable.";
}

?>

<!-- Bar de navigation  -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
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


<!-- Contenu principal de la page  -->
<div class="main d-flex justify-content-center align-items-center">

    <div class="containerPrincipal rounded ">

        <?php
            // Si les donnés du formulaire ont ete soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                // Affectation des donnés du formulaire a des variables
                $nom = $_POST['nom'];
                $email = $_POST['email'];
                $date_reservation = date('Y-m-d', strtotime($_POST['date']));

                // Requete pour recuperer l'ID de la chambre
                $stmt = $connexion->prepare("SELECT idChambre FROM chambre WHERE nomChambre = ?");
                $stmt->bind_param("s", $chambre);
                $stmt->execute();
                $stmt->bind_result($idChambre);
                $stmt->fetch();
                $stmt->close();

                // Requete d'insertion dans la table reservation
                $stmt = $connexion->prepare("INSERT INTO reservation (emailUser, idChambre, dateReservation, nomReservation) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("siss", $email, $idChambre, $date_reservation, $nom);
                $stmt->execute();

                // Si l'insertion s'est bien déroulé
                if ($stmt->affected_rows > 0) {
                    
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Votre réservation pour la chambre ' . $chambre . ' le ' . $date_reservation . ' a été enregistrée avec succès! A bientot dans notre Hotel.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

                    $stmt->close();
                    $connexion->close();

                } else {
                    // Si echec de l'insertion
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Erreur lors de l\'enregistrement de la réservation.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                            
                    $stmt->close();
                    $connexion->close();
                }
            }
        ?>

        <h1><?php echo 'Chambre '.$chambre?></h1>
        <img src="<?php echo $image?>" alt="image chambre">
        <p class="textContainer"><?php echo $description ?></p>
        <h2>Date disponible :</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Prix de la nuit : <?php echo $prixChambre ?>$</li>
            <li class="list-group-item">Capacité : <?php echo $nbPlaces ?> personnes</li>
        </ul>
        <br>
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Réserver
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Réservation <?php echo $chambre ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST">
                        <div class="modal-body">
                            <label class="text-dark" for="nom">Nom : </label>
                            <input type="text" id="nom" name="nom" value="<?php echo $nom ?>" required>
                            <br>
                            <label class="text-dark" for="email">Email : </label>
                            <input type="email" id="email" name="email" value="<?php echo $email ?>" required>
                            <br>
                            <label class="text-dark" for="date">Date souhaité : </label>
                            <input type="date" id="date" name="date" value="" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <a href="index.php" class="btn btn-outline-dark">Autres chambres</a>
    </div>

</div>




<?php require_once('includes/partials/footer.php'); ?>