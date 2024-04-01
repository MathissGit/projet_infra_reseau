<?php

session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else { $email = ''; }

$PAGENAME = "Mes réservations";

// Includes & Requires 
require_once('includes/partials/header.php');
require('serveur_db.php');

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
<div class="container mt-5">
    <h1 class="text-center mb-4">Mes Réservations</h1>
    <div class="row">



    <!-- TO DO : Modifier une reservation ( Nom, Prenom, Chambre, Date )  -->



        <?php

            // Requête pour récupérer les réservations de l'utilisateur en cours avec les informations de la chambre correspondante
            $sql = "SELECT reservation.*, chambre.nomChambre, chambre.nbPlaces, chambre.prixChambre FROM reservation 
                    INNER JOIN chambre ON reservation.idChambre = chambre.idChambre 
                    WHERE reservation.emailUser = ?";
            $stmt = $connexion->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            // Boucle pour afficher les réservations si elles existent dans la base de données
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card" style="width: 30vw;">';
                    echo '<img src="includes/img/default.jpg" class="card-img-top" alt="image chambre par default">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">Chambre ' . $row['nomChambre'] . '</h5>';
                    echo '<ul class="list-group list-group-flush">';
                    echo "<li class='list-group-item'>Numéro de réservation : ". $row['idReservation'] . "</li>";
                    echo "<li class='list-group-item'>Date : ". $row['dateReservation'] . "</li>";
                    echo "<li class='list-group-item'>Nombre de personnes : ". $row['nbPlaces'] . " personnes</li>";
                    echo "<li class='list-group-item'>Prix de la nuit : ". $row['prixChambre'] . " $</li>";
                    echo "<li class='list-group-item'>Nom de la réservation : ". $row['nomReservation'] . "</li>";
                    echo '</ul>';
                    echo '</br>';
                    echo "<button class='btn-supprimer-reservation btn btn-outline-dark' data-id='{$row['idReservation']}'>Annuler la réservation</button>";
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">Pas de réservation.</p>';
            }

        ?>

    </div>

</div>


<script>
    // Attend que le document soit chargé
    document.addEventListener("DOMContentLoaded", function () {
        // Recupere tous les boutons de suppression de reservation
        const btnsSupprimerReservation = document.querySelectorAll('.btn-supprimer-reservation');

        // Pour chaque bouton
        btnsSupprimerReservation.forEach(btn => {
            // Ajoute un écouteur d'événement sur le clic
            btn.addEventListener('click', function () {
                // Récupère l'ID de la réservation depuis l'attribut data-id
                const idReservation = this.getAttribute('data-id');

                // Envoie une requête POST au serveur pour supprimer la réservation
                fetch('supprimer_reservation.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'idReservation=' + encodeURIComponent(idReservation),
                })
                .then(response => {
                    if (response.ok) {
                        // Si la suppression a réussi, actualise la page pour refléter les changements
                        window.location.reload();
                    } else {
                        // Gère les erreurs en fonction de la réponse du serveur
                        console.error('Erreur lors de la suppression de la réservation');
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression de la réservation', error);
                });
            });
        });
    });
</script>



<?php include('includes/partials/footer.php') ?>