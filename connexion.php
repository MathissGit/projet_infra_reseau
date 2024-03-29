<?php require_once('includes/partials/header.php') ?>

<div class="container-form">
    <div class="login-form">
        <h2>Connexion</h2>
        <!-- TO DO : Rediriger le formulaire vers la page de gestion des utilisateur -->
        <form method="post"> 
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" placeholder="Entrez votre email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        <a href="inscription.php">inscription</a>
        </form>
    </div>
</div>

<?php require_once('includes/partials/footer.php') ?>