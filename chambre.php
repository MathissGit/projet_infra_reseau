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