<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "innovation_design";
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   if (!$conn) {
       die("Connexion échouée : " . mysqli_connect_error());
   }
if (isset($_GET['q'])) {
    $search_query = $_GET['q'];

    // Exemple de requête SQL pour rechercher dans une table "services"
    $sql = "SELECT * FROM services WHERE services LIKE '%$search_query%'";

    // Exécution de la requête
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des résultats de la recherche
        while ($row = $result->fetch_assoc()) {
            echo "Nom du service : " . $row['nom_service'] . "<br>";
            // Ajoutez d'autres champs que vous souhaitez afficher
        }
    } else {
        echo "Aucun résultat trouvé pour la recherche : " . $search_query;
    }
  }
// Fermeture de la connexion à la base de données
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style de la section du formulaire */
.searchservice {
  margin: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Style de la zone de recherche */
.find {
  position: relative;
  display: flex;
  align-items: center;
}

/* Style de l'icône dans la zone de recherche */
.ic {
  fill: #888; /* Couleur de l'icône */
  width: 24px;
  height: 24px;
  margin-right: 10px;
}

/* Style du champ de recherche */
#searchservice {
  flex: 1;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 3px;
}

/* Style du bouton de réinitialisation */
.rest {
  background: none;
  border: none;
  width: 24px;
  height: 24px;
  cursor: pointer;
}

/* Style du bouton de recherche */
.btn_prim_md-mls-fsh0 {
  padding: 8px 16px;
  background-color: #007bff; /* Couleur de fond du bouton */
  color: #fff; /* Couleur du texte */
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

/* Style du bouton de recherche au survol */
.btn_prim_md-mls-fsh0:hover {
  background-color: #0056b3; /* Couleur de fond du bouton au survol */
}

    </style>
</head>
<body>
    <form id="search" method="get" class="searchservice" action="services.php" data-track-onsubmit="search">
        <div class="find" >
            <input type="text" name="q" id="searchservice" placenholder="chercher ici un service" aria-label="rechercher" value autocomplete="off" required>
            <button type="button" class="rest" aria-label="réinitialiser"></button>
            </button>
            <div> 
             <button class="btn_prim_md-mls-fsh0">rechercher
            </button>
        </div>
    </form>
</body>
</html>