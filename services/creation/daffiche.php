<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des valeurs du formulaire
    $nom_demandeur = $_POST['nom_demandeur'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $titre_affiche = $_POST['titre_affiche'];
    $objectif_affiche = $_POST['objectif_affiche'];
    $public_cible = $_POST['public_cible'];
    $format_affiche = $_POST['format_affiche'];
    $texte_principal = $_POST['texte_principal'];
    $date_livraison = $_POST['date_livraison'];
    $remarques = $_POST['remarques'];

    // Connexion à la base de données
    $servername = "localhost"; // Adresse du serveur MySQL
    $username = "root"; // Nom d'utilisateur MySQL
    $password = ""; // Mot de passe MySQL
    $dbname = "innovation_design"; // Nom de la base de données

    // Connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Requête d'insertion dans la base de données
    $sql = "INSERT INTO demande_affiche (nom_demandeur, telephone, email, titre_affiche, objectif_affiche, public_cible, format_affiche,  texte_principal, date_livraison, remarques) 
            VALUES ('$nom_demandeur', '$telephone', '$email', '$titre_affiche', '$objectif_affiche', '$public_cible', '$format_affiche', '$texte_principal', '$date_livraison', '$remarques')";

    // Exécution de la requête
    if ($conn->query($sql) === TRUE) {
        header("location: ../../index.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
}
?>
