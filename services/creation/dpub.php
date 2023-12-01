<?php

// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=innovation_design";
$username = "root";
$password = "";

$pdo = new PDO($dsn, $username, $password);

// Récupération des données du formulaire
$nom_entreprise = $_POST["nom_entreprise"];
$contact_principal = $_POST["contact_principal"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];
$type_publicite = $_POST["type_publicite"];
$objectif_publicite = $_POST["objectif_publicite"];
$public_cible = $_POST["public_cible"];
$format_publicite = $_POST["format_publicite"];
$texte_principal = $_POST["texte_principal"];
$date_diffusion = $_POST["date_diffusion"];
$budget_publicite = $_POST["budget_publicite"];
$canal_diffusion = $_POST["canal_diffusion"];
$remarques = $_POST["remarques"];

// Insertion des données dans la base de données
$sql = "INSERT INTO demande_publicite (
  nom_entreprise,
  contact_principal,
  telephone,
  email,
  type_publicite,
  objectif_publicite,
  public_cible,
  format_publicite,
  texte_principal,
  date_diffusion,
  budget_publicite,
  canal_diffusion,
  remarques
) VALUES (
  :nom_entreprise,
  :contact_principal,
  :telephone,
  :email,
  :type_publicite,
  :objectif_publicite,
  :public_cible,
  :format_publicite,
  :texte_principal,
  :date_diffusion,
  :budget_publicite,
  :canal_diffusion,
  :remarques
)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":nom_entreprise", $nom_entreprise);
$stmt->bindParam(":contact_principal", $contact_principal);
$stmt->bindParam(":telephone", $telephone);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":type_publicite", $type_publicite);
$stmt->bindParam(":objectif_publicite", $objectif_publicite);
$stmt->bindParam(":public_cible", $public_cible);
$stmt->bindParam(":format_publicite", $format_publicite);
$stmt->bindParam(":texte_principal", $texte_principal);
$stmt->bindParam(":date_diffusion", $date_diffusion);
$stmt->bindParam(":budget_publicite", $budget_publicite);
$stmt->bindParam(":canal_diffusion", $canal_diffusion);
$stmt->bindParam(":remarques", $remarques);

$stmt->execute();

// Affichage d'un message de succès
header("location: ../../index.php");

?>
