<?php 


// Fonction pour compter et recuperer le nombre de reservation faites par un client 
function count_nb_reservation($emailUser) {

    require('serveur_db.php');

    $sql = "SELECT COUNT(*) AS reservation FROM reservation WHERE emailUser = ?";
    $stmt2 = $connexion->prepare($sql);

    if ($stmt2) {
        $stmt2->bind_param("s", $emailUser);
        $stmt2->execute();
        $result = $stmt2->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $result = $row['reservation'];
        }
        $stmt2->close();
        return $result;
    }
}


?>