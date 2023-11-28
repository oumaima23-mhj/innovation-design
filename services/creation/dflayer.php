<?php

// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=innovation_design";
$username = "root";
$password = "";

$pdo = new PDO($dsn, $username, $password);

// Récupération des données du formulaire
$nom_evenement = $_POST["nom_evenement"];
$contact_principal = $_POST["contact_principal"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];
$objectif_flyer = $_POST["objectif_flyer"];
$public_cible = $_POST["public_cible"];
$format_flyer = $_POST["format_flyer"];
$texte_principal = $_POST["texte_principal"];
$date_distribution = $_POST["date_distribution"];
$budget_flyer = $_POST["budget_flyer"];
$remarques = $_POST["remarques"];

// Insertion des données dans la base de données
$sql = "INSERT INTO demande_flyer (nom_evenement, contact_principal, telephone, email, objectif_flyer, public_cible, format_flyer, texte_principal, date_distribution, budget_flyer, remarques) VALUES (:nom_evenement, :contact_principal, :telephone, :email, :objectif_flyer, :public_cible, :format_flyer, :texte_principal, :date_distribution, :budget_flyer, :remarques)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":nom_evenement", $nom_evenement);
$stmt->bindParam(":contact_principal", $contact_principal);
$stmt->bindParam(":telephone", $telephone);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":objectif_flyer", $objectif_flyer);
$stmt->bindParam(":public_cible", $public_cible);
$stmt->bindParam(":format_flyer", $format_flyer);
$stmt->bindParam(":texte_principal", $texte_principal);
$stmt->bindParam(":date_distribution", $date_distribution);
$stmt->bindParam(":budget_flyer", $budget_flyer);
$stmt->bindParam(":remarques", $remarques);

$stmt->execute();

header("location: ../../acceuil.php");

?>
