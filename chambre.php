<?php

session_start();

if (isset($_SESSION['nom'])) {
    $nom = $_SESSION['nom'];
} else { $nom = 'Dupond'; }

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
