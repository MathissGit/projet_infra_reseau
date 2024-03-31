<?php

session_start();

$PAGENAME = "Connexion";

// Includes & Requires 
require_once('includes/partials/header.php');
require('serveur_db.php');

?>
<div class="container-form">

    <?php 
        if (isset($_GET['email'])) {
            $email = $_GET['email'];

            // Vérifier si l'e-mail existe dans la base de données
            $sql = "SELECT * FROM users WHERE emailUser = ?";
            $stmt = $connexion->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            // Si l'e-mail existe dans la base de données
            if ($result->num_rows > 0) {
                echo "<p style='color: green;'>Inscription confirmée</p>";
            } else {
                echo "<p style='color: red;'>E-mail non trouvé dans la base de données</p>";
            }
        }
    ?>

    <div class="login-form">
        <h2>Connexion</h2>
        <form action="connexion_traitement.php" autocomplete ="off" method="POST"> 
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            <div class="option-form">Pas de compte ? <a href="inscription.php">Inscription</a></div>
            <?php
                if(isset($_GET['error']) && $_GET['error'] === 'incorrect'){
                    echo "<p style='color: red;'>Le nom d'utilisateur ou le mot de passe est incorrect.</p>";
                }
                if(isset($_GET['error']) && $_GET['error'] === 'inexistant'){
                    echo "<p style='color: red;'>Utilisateur introuvable.<a href='inscription.php'>inscrivez-vous</a></p>";
                }
            ?>
        </form>
    </div>
</div>

<?php require_once('includes/partials/footer.php') ?>