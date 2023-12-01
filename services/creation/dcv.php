<?php

// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=innovation_design";
$username = "root";
$password = "";

$pdo = new PDO($dsn, $username, $password);

// Récupération des données du formulaire
$nom_entreprise = $_POST["nom_entreprise"];
$nom_personne_contact = $_POST["nom_personne_contact"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$adresse = $_POST["adresse"];
$exemple_1 = $_FILES["exemple_1"]["name"];
$exemple_2 = $_FILES["exemple_2"]["name"];
$notes_supplementaires = $_POST["notes_supplementaires"];

// Déplacement des fichiers
$dossier_destinataire = "./upload/";

move_uploaded_file($_FILES["exemple_1"]["tmp_name"], $dossier_destinataire . $exemple_1);
move_uploaded_file($_FILES["exemple_2"]["tmp_name"], $dossier_destinataire . $exemple_2);

// Insertion des données dans la base de données
$sql = "INSERT INTO demande_carte_visite (nom_entreprise, nom_personne_contact, email, telephone, adresse, exemple_1, exemple_2, notes_supplementaires) VALUES (:nom_entreprise, :nom_personne_contact, :email, :telephone, :adresse, :exemple_1, :exemple_2, :notes_supplementaires)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":nom_entreprise", $nom_entreprise);
$stmt->bindParam(":nom_personne_contact", $nom_personne_contact);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":telephone", $telephone);
$stmt->bindParam(":adresse", $adresse);
$stmt->bindParam(":exemple_1", $exemple_1);
$stmt->bindParam(":exemple_2", $exemple_2);
$stmt->bindParam(":notes_supplementaires", $notes_supplementaires);

$stmt->execute();

// Affichage d'un message de succès
header("location: ../../index.php");
?>
