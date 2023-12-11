<?php
session_start();
if(empty($_SESSION["admin"])) { 
    header("location: ./login.php");
}
include "nav.php";
?>
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables flayers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
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
$sql = "SELECT * FROM demande_flyer";
$result = $conn->query($sql);

// Afficher les données dans le format de table HTML
if ($result->num_rows > 0) {
    echo '<table id="datatablesSimple">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>id</th>';
    echo '<th>nom_evenement</th>';
    echo '<th>contact principal</th>';
    echo '<th>telephone</th>';
    echo '<th>email</th>';
    echo '<th>objectif flyer</th>';
    echo '<th>public cible</th>';
    echo '<th>format flyer</th>';
    echo '<th>couleurs</th>';
    echo '<th>texte principal</th>';
    echo '<th>date distribution</th>';
    echo '<th>budget flyer</th>';
    echo '<th>remarques</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["nom_evenement"] . '</td>';
        echo '<td>' . $row["contact_principal"] . '</td>';
        echo '<td>' . $row["telephone"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["objectif_flyer"] . '</td>';
        echo '<td>' . $row["public_cible"] . '</td>';
        echo '<td>' . $row["format_flyer"] . '</td>';
        echo '<td>' . $row["couleurs"] . '</td>';
        echo '<td>' . $row["texte_principal"] . '</td>';
        echo '<td>' . $row["date_distribution"] . '</td>';
        echo '<td>' . $row["budget_flyer"] . '</td>';
        echo '<td>' . $row["remarques"] . '</td>';
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
<<<<<<< Updated upstream
                            <div class="text-muted">innovation design 2023</div>
=======
                        <p class="text-secondary mb-0">&copy; <a class="text-light fw-bold" href="#">innovation design</a>. 2023 All Rights Reserved.</p>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
>>>>>>> Stashed changes
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
