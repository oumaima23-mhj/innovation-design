<?php
// Vérifier si des données ont été envoyées en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données requises sont présentes
    if (isset($_POST['userId']) && isset($_POST['action'])) {
        // Récupérer les données envoyées par AJAX
        $userId = $_POST['userId'];
        $action = $_POST['action'];

        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "innovation_design";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Mettre à jour l'état du compte utilisateur en fonction de l'action (blocage ou déblocage)
        if ($action === 'block') {
            $sql = "UPDATE user SET status = 0 WHERE id = $userId";
        } elseif ($action === 'deblock') {
            $sql = "UPDATE user SET status = 1 WHERE id = $userId";
        }

        if ($conn->query($sql) === TRUE) {
            // Répondre au client (AJAX) avec un message de succès ou toute autre donnée nécessaire
            echo "Opération réussie : État du compte utilisateur mis à jour.";
        } else {
            echo "Erreur lors de la mise à jour de l'état du compte utilisateur : " . $conn->error;
        }

        $conn->close();
    } else {
        // Répondre au client (AJAX) avec un message d'erreur si des données requises sont manquantes
        echo "Données manquantes pour effectuer l'action.";
    }
} else {
    // Répondre au client (AJAX) avec un message d'erreur si la méthode de requête n'est pas POST
    echo "Erreur : méthode de requête incorrecte.";
}
?>
