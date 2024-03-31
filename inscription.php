<?php

session_start();

$PAGENAME = "Page d'inscription";

// Includes & Requires 
require_once('includes/partials/header.php');

?>
  
<div class="container-form">
    <div class="register-form">
        <h2>Inscription</h2>
        <form action="inscription_traitement.php" autocomplete ="off" method="POST">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" require>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" require>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" require>
            </div>
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
            <div class="option-form">Déja un compte ? <a href="connexion.php">Connexion</a></div>

            <?php 
            
            if(isset($_GET['error']) && $_GET['error'] === 'empty_fields') {
                echo"<p style='color:red;'>N'oubilez pas de remplir tout les champs</p>";
                }
            if(isset($_GET['error']) && $_GET['error'] === 'user_exist'){
                echo "<p style='color: red;'>Un compte existe deja.<a href='home.php'>Connectez-vous</a></p>";
                }
            if(isset($_GET['error']) && $_GET['error'] === 'error_email_send'){
                echo "<p style='color: red;'>'Erreur lors de l\'envoi de l\'e-mail de vérification. Veuillez recommencer'</p>";
                }
            if(isset($_GET['error']) && $_GET['error'] === 'insert_failure'){
                echo "<p style='color: red;'>'Erreur lors de l\'insertion dans la base de donnés.'</p>";
                }

            ?>

        </form>
    </div>
</div>



<?php require_once('includes/partials/footer.php') ?>