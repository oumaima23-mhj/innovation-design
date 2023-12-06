<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_com = $_POST['id_com']; // L'identifiant du commentaire auquel vous répondez
    $nom = $_POST['nom']; // Nom de l'utilisateur (à adapter selon votre logique)
    $commentaire = $_POST['comment']; // Contenu de la réponse

    // Date système actuelle
    $date = date('Y-m-d H:i:s');

    // Connexion à la base de données (à remplir avec vos propres informations)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "innovation_design";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Définir le mode d'erreur PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête d'insertion pour ajouter une nouvelle réponse à la table 'reply'
        $sql = "INSERT INTO reply (id_com, nom, date, commentaire) VALUES (:id_com, :nom, :date, :commentaire)";
        $stmt = $conn->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':id_com', $id_com);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':commentaire', $commentaire);

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
