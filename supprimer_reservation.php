<?php

// Includes & Requires
require('serveur_db.php');
require('includes/function.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['idReservation'])) {

        $id_reservation = $_POST['idReservation'];

        $sql = "DELETE FROM reservation WHERE idReservation = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->bind_param("i", $id_reservation);

        if ($stmt->execute()) {
            echo "Réservation supprimée avec succès.";
        } else {
            echo "Erreur lors de la suppression de la réservation.";
        }

        $stmt->close();
        $connexion->close();
    } else {
        echo "ID de réservation manquant.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>
