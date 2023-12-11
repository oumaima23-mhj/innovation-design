<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innovation_design";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

// Vérifier si l'identifiant de l'utilisateur est présent dans l'URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Requête SQL pour supprimer l'utilisateur avec l'ID spécifié
    $sql = "DELETE FROM user WHERE id = ?";

    // Préparation de la requête
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Liaison des paramètres avec la requête
        mysqli_stmt_bind_param($stmt, "i", $user_id);

        // Exécution de la requête préparée
        mysqli_stmt_execute($stmt);

        // Vérifier si la suppression a réussi
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("location:index.php");
        } else {
            echo "Aucun utilisateur trouvé avec l'ID " . $user_id;
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
