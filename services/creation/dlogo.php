<?php

// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=innovation_design";
$username = "root";
$password = "";

$pdo = new PDO($dsn, $username, $password);

// Récupération des données du formulaire
$nom_entreprise = $_POST["nom_entreprise"];
$description_entreprise = $_POST["description_entreprise"];
$exemple_1 = $_FILES["exemple_1"]["name"];
$exemple_2 = $_FILES["exemple_2"]["name"];
$notes_supplementaires = $_POST["notes_supplementaires"];

// Insertion des données dans la base de données
$sql = "INSERT INTO demande_logo (nom_entreprise, couleurs, description_entreprise, exemple_1, exemple_2, notes_supplementaires) VALUES (:nom_entreprise, :couleurs, :description_entreprise, :exemple_1, :exemple_2, :notes_supplementaires)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":nom_entreprise", $nom_entreprise);
$stmt->bindParam(":description_entreprise", $description_entreprise);
$stmt->bindParam(":exemple_1", $exemple_1);
$stmt->bindParam(":exemple_2", $exemple_2);
$stmt->bindParam(":notes_supplementaires", $notes_supplementaires);

$stmt->execute();

// Déplacement des fichiers
$dossier_destinataire = "./upload/";

move_uploaded_file($_FILES["exemple_1"]["tmp_name"], $dossier_destinataire . $exemple_1);
move_uploaded_file($_FILES["exemple_2"]["tmp_name"], $dossier_destinataire . $exemple_2);

// Affichage d'un message de succès
header("location: ../../acceuil.php");

?>
