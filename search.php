<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innovation_design";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

if (isset($_GET['q'])) {
    $search_query = $_GET['q'];

    // Utilisation de requêtes préparées pour la sécurité
    $sql = "SELECT * FROM services WHERE title LIKE ? OR description LIKE ?";
    
    // Préparation de la requête
    $stmt = mysqli_prepare($conn, $sql);

    // Vérification de la préparation de la requête
    if ($stmt) {
        // Ajout du caractère joker (%) pour la recherche
        $param = "%" . $search_query . "%";

        // Liaison des paramètres avec la requête
        mysqli_stmt_bind_param($stmt, "ss", $param, $param);

        // Exécution de la requête préparée
        mysqli_stmt_execute($stmt);

        // Récupération des résultats
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Affichage des résultats de la recherche
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Title: " . $row['title'] . "<br>";
                // Ajoutez d'autres champs que vous souhaitez afficher
            }
        } else {
            echo "Aucun résultat trouvé pour : " . $search_query;
        }

        // Fermeture de la requête préparée
        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur dans la préparation de la requête : " . mysqli_error($conn);
    }
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
