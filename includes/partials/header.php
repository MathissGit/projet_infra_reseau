<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site de reservation de chambres d'hotel. Travail d'école">
    <meta name="keywords" content="HTML, CSS, PHP, JavaScript">
    <meta name="authors" content="Mathis.S, Romain, Alexis, Mathis.T"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $PAGENAME ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../includes/style/style.css">
	<script src="../../includes/src/hotel.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Hôtel du Telhô</a>
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