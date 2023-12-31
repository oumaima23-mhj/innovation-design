<?php 
session_start();
if(empty($_SESSION["admin"])) { 
                 header("location: ./login.php");
                    } 
                   include "nav.php" ; ?>
                    <div id="layoutSidenav_content">
                     <main>
                     <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables Logo</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">tableau de bord </a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                           // Connexion à la base de données - à remplacer avec vos propres informations
                             $servername = "localhost";
                             $username = "root";
                             $password = "";
                             $dbname = "innovation_design";
                             // Connexion à la base de données
                             $conn = new mysqli($servername, $username, $password, $dbname);
                              // Vérifier la connexion
                              if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                             }
                              // Requête pour récupérer les données de la table demande_affiche
                             $sql = "SELECT * FROM demande_logo";
$result = $conn->query($sql);

// Afficher les données dans le format de table HTML
if ($result->num_rows > 0) {
    echo '<table id="datatablesSimple">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id</th>';
    echo '<th>nom entreprise</th>';
    echo '<th>couleurs</th>';
    echo '<th>description entreprise</th>';
    echo '<th>exemple 1</th>';
    echo '<th>exemple 2</th>';
    echo '<th>notes supplementaires</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["nom_entreprise"] . '</td>';
        echo '<td>' . $row["couleurs"] . '</td>';
        echo '<td>' . $row["description_entreprise"] . '</td>';
        echo '<td>' . $row["exemple_1"] . '</td>';
        echo '<td>' . $row["exemple_2"] . '</td>';
        echo '<td>' . $row["notes_supplementaires"] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "0 results";
}

// Fermer la connexion à la base de données
$conn->close();
?>

                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        <p class="text-secondary mb-0">innovation design</a>. 2023 All Rights Reserved.</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
