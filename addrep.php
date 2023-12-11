<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $service_id = $_POST['service_id']; // L'identifiant du commentaire auquel vous répondez
    $nom = $_POST['nom']; // Nom de l'utilisateur (à adapter selon votre logique)
    $commentaire = $_POST['comment']; // Contenu de la réponse
    $com_id=$_POST["com_id"];
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
        $sql = "INSERT INTO commentaire (id_service, nom, date, comment, reponse) VALUES (:id_service, :nom, :date, :commentaire, :reponse)";
        $stmt = $conn->prepare($sql);
        
        // Liaison des paramètres
        $stmt->bindParam(':id_service', $service_id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':commentaire', $commentaire);
        $stmt->bindParam(':reponse', $com_id);

        
        // Exécution de la requête d'insertion
        $stmt->execute();
        
        header("location:service-single.php?service_id=".$service_id);

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    // Fermer la connexion à la base de données après l'insertion
    $conn = null;
}
?>
