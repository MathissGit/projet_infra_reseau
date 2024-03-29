<?php require_once('includes/partials/header.php') ?>
  
<div class="container-form">
    <div class="register-form">
        <h2>Inscription</h2>
        <!-- TO DO : rediriger vers les fonction qui inscrive un utilisateur dans la base de donnée -->
        <form method="post">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" id="name" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
            <a href="connexion.php">Se Connecter</a>
        </form>
    </div>
</div>

<?php require_once('includes/partials/footer.php') ?>