<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_SESSION['user']; // Supposons que vous avez un nom d'utilisateur stocké dans la session
    $date = date('Y-m-d H:i:s'); // Date système actuelle
    $comment = $_POST['comment']; // Contenu du commentaire
    $rating = $_POST['rating']; // Valeur de l'évaluation

    // Connexion à la base de données (à remplir avec vos propres informations)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "innovation_design";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Définir le mode d'erreur PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête d'insertion pour ajouter un nouveau commentaire à la table 'commentaire'
        $sql = "INSERT INTO commentaire (nom, date, comment, rating) VALUES (:nom, :date, :comment, :rating)";
        $stmt = $conn->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':rating', $rating);

        // Exécution de la requête d'insertion
        $stmt->execute();

        header("location:a-propos.php");

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    // Fermer la connexion à la base de données après l'insertion
    $conn = null;
}
?>
