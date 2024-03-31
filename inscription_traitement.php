<?php

session_start();

// Includes & Requires 
require('serveur_db.php');
require('includes/function.php');

// Recuperer les information transmises par le formulaire d'Inscription. Affectation dans $_SESSION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name']; 
    $_SESSION['email'] = $_POST['email']; 
    $_SESSION['reservation'] = count_nb_reservation($_SESSION['email']);
    $_SESSION['connecte'] = true;
}


// Si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifie si tous les champs sont présents
    if (
        isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])
    ) {

        // Affecte chaque champ du formulaire à une variable 
        $nom = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Verifie si l'adresse mail n'est pas deja dans la base de données
        $requestMailExist = "SELECT * FROM users WHERE emailUser = ?";
        $stmt_verif_mail = $connexion->prepare($requestMailExist);
        $stmt_verif_mail->bind_param("s", $email);
        $stmt_verif_mail->execute();
        $result = $stmt_verif_mail->get_result();

        // Vérifie si des resultats ont ete renvoyé
        if ($result->num_rows > 0) {

            // Le mail existe deja dans la base de donnés
            header("Location: inscription.php?error=user_exist");
            exit();

        }


        // Hachage du mot de passe
        $motDePasseHache = password_hash($password, PASSWORD_DEFAULT);
        // Génération d'un token
        $token = bin2hex(random_bytes(16));


        // Insertion dans la table utilisateur
        $insert_user = "INSERT INTO users (emailUser, nomUser, passwordUser) VALUES (?, ?, ?)";
        $stmt_user = $connexion->prepare($insert_user);
        $stmt_user->bind_param("sss", $email, $nom, $motDePasseHache);
        $success = $stmt_user->execute();

        if ($success) {

            $connexion->commit();
            header("Location: index.php");
            exit();
        
        } else {
         
            $connexion->rollback();
            header("Location: inscription.php?error=insert_failure");
            exit();
        
        }
        
    } else {

        // Tous les champs ne sont pas remplis : redirection avec un message d'erreur
        header("Location: inscription.php?error=empty_fields");
        exit();

    }

} else {

    // Redirection si le formulaire n'est pas soumis avec la méthode POST
    header("Location: inscription.php");
    exit();
    
}
?>
