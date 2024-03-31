<?php

session_start();

// Includes & Requires 
require('serveur_db.php');
require('includes/function.php');


// Recuperer les information transmises par le formulaire de connexion. Affectation dans $_SESSION et variables 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION['email'] = $_POST['email'];
  $email = $_POST['email'];
  $_SESSION['connecte'] = true;
}


if (isset($_POST['email']) && isset($_POST['password'])) {

  // Variables 
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Verification de la connexion
  if ($connexion->connect_error) {
    die("Connexion échouée : " . $connexion->connect_error);
  }


  // Requete pour verifier les identifiants dans la base de données
  $sql = "SELECT * FROM users WHERE emailUser = ? LIMIT 1";
  $stmt = $connexion->prepare($sql);

  if ($stmt) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();
      if (password_verify($password, $user['passwordUser'])) {

        // Requete pour recuperer toute les informations de l'utilisateur  
        $info_user = "SELECT * FROM users WHERE emailUser = ? LIMIT 1 ";
        $stmt = $connexion->prepare($info_user);

        if ($stmt) {
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows === 1) {
            // Mettre les informations recuperés dans la $_SESSION et variables 
            $row = $result->fetch_assoc();
            $_SESSION['nom'] = $row['nom'];
            $nom = $_SESSION['nom'];
            $_SESSION['id_client'] = $row['idUser'];
            $id_client = $_SESSION['id_client'];
            $_SESSION['reservation'] = 0;
          }

        }

        // Redirection vers la page d'accueil
        header("Location: index.php");
        exit();

      } else {

        // Sinon rediriger vers la page de connexion avec une erreur
        header("Location: connexion.php?error=incorrect");
        exit();

      }
    } else {

      // Si l'utilisateur n'existe pas dans la base de donnés 
      header("Location: connexion.php?error=inexistant");
      exit();

    }

    $stmt->close();

  } else {
      echo "Erreur lors de la préparation de la requête : " . $connexion->error;
  }

  $connexion->close();

}


?>