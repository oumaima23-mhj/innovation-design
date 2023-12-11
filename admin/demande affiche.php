<?php 
session_start();
if(empty($_SESSION["admin"])) { 
    header("location: ./login.php");
}
include "nav.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tables affiche</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>

<<<<<<< Updated upstream
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
                 $sql = "SELECT * FROM demande_affiche";
                 $result = $conn->query($sql);
                 // Afficher les données dans le format de table HTML
                 if ($result->num_rows > 0) {
                 echo '<table id="datatablesSimple">';
                 echo '<thead>';
                 echo '<tr>';
                 echo '<th>id</th>';
                 echo '<th>nom demandeur</th>';
                 echo '<th>telephone</th>';
                 echo '<th>email</th>';
                 echo '<th>titre affiche</th>';
                 echo '<th>objectif affiche</th>';
                 echo '<th>public cible</th>';
                 echo '<th>format affiche</th>';
                 echo '<th>texte principal</th>';
                 echo '<th>date livraison</th>';
                 echo '<th>remarques</th>';
                 echo '</tr>';
                 echo '</thead>';
                 echo '<tbody>';

                 // Output data of each row
                   while($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["id"] . '</td>';
                    echo '<td>' . $row["nom_demandeur"] . '</td>';
                    echo '<td>' . $row["telephone"] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["titre_affiche"] . '</td>';
                    echo '<td>' . $row["objectif_affiche"] . '</td>';
                    echo '<td>' . $row["public_cible"] . '</td>';
                    echo '<td>' . $row["format_affiche"] . '</td>';
                    echo '<td>' . $row["texte_principal"] . '</td>';
                    echo '<td>' . $row["date_livraison"] . '</td>';
                    echo '<td>' . $row["remarques"] . '</td>';
                    echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                    } else {
                    echo "0 results";
                    }
                  $conn->close();
                   ?>

                </div>
=======
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        <p class="text-secondary mb-0">&copy; <a class="text-light fw-bold" href="#">innovation design</a>. 2023 All Rights Reserved.</p>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
>>>>>>> Stashed changes
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted"> innovation design 2023</div>
        
        </div>
    </footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>