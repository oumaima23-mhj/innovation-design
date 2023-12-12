<?php
session_start();
$erreurs = array(); // Initialisation du tableau des erreurs
// Vérification si la méthode est bien POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numero_telephone = $_POST['numero_telephone'];
    $e_mail = $_POST['e_mail'];
    $mdp = $_POST['password'];
    // Validation des données
    $erreurs = array();
    // Vérification du nom
    if (empty($nom)) {
        $erreurs[] = "Le champ Nom est vide.";
    }
    // Vérification du prénom
    if (empty($prenom)) {
        $erreurs[] = "Le champ Prénom est vide.";
    }
    // Vérification du numéro de téléphone
    if (empty($numero_telephone)) {
        $erreurs[] = "Le champ Numéro de téléphone est vide.";
    }
    // Vérification de l'adresse e-mail
    if (empty($e_mail)) {
        $erreurs[] = "Le champ E-mail est vide.";
    } elseif (!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse e-mail n'est pas valide.";
    }
    // Vérification du mot de passe
    if (empty($mdp)) {
        $erreurs[] = "Le champ Mot de passe est vide.";
    }

    if (!empty($erreurs)) {
        $_SESSION['erreurs'] = $erreurs;
        header("Location: compte.php?nom=".$nom."&&prenom=".$prenom."&&tel=".$numero_telephone."&&email=".$e_mail."");
        exit; // Terminer l'exécution du script après la redirection
    }
// Etablir la connexion à la base de données (à adapter selon votre configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innovation_design";
// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Requête d'insertion
$sql = "INSERT INTO `user`(`nom`, `prenom`, `numero_telephone`, `e_mail`, `password`) VALUES ('$nom', '$prenom', '$numero_telephone', '$e_mail', '$mdp')";
if ($conn->query($sql) === TRUE) {
    header("Location: ./login.php");
    exit; // Terminer l'exécution du script après la redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close(); // Fermer la connexion à la base de données

    }