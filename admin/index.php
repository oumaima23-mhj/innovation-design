<?php 
session_start();
if(empty($_SESSION["admin"])) { 
    header("location: ./login.php");
}



include "nav.php";
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
  $sql = "SELECT * FROM user";
  $result = $conn->query($sql);

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>


// Fonction pour bloquer un utilisateur
function blockUser(userId) {
    $.ajax({
        type: "POST",
        url: "block_user.php",
        data: { userId: userId, action: 'block' },
        success: function(response) {
            // Gérer la réponse du serveur après le blocage
            console.log(response);
            // Afficher une alerte
            alert("Utilisateur bloqué avec succès!");
            // Recharger la page après 1 seconde
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(xhr, status, error) {
            // Gérer les erreurs
            console.error(error);
            // Afficher une alerte en cas d'erreur
            alert("Erreur lors du blocage de l'utilisateur.");
        }
    });
}

// Fonction pour débloquer un utilisateur
function deblockUser(userId) {
    $.ajax({
        type: "POST",
        url: "block_user.php",
        data: { userId: userId, action: 'deblock' },
        success: function(response) {
            // Gérer la réponse du serveur après le déblocage
            console.log(response);
            // Afficher une alerte
            alert("Utilisateur débloqué avec succès!");
            // Recharger la page après 1 seconde
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(xhr, status, error) {
            // Gérer les erreurs
            console.error(error);
            // Afficher une alerte en cas d'erreur
            alert("Erreur lors du déblocage de l'utilisateur.");
        }
    });
}




</script>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">tableau de bord </h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Recherche et Analyse</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Esquisses et Concepts </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Révisions et Ajustements </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Finalisation et Livraison</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Ventes Mensuelles
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Performances Financières
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <?php
                if ($result->num_rows > 0) {
                    echo '<table id="datatablesSimple">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>id</th>';
                    echo '<th>nom</th>';
                    echo '<th>prenom</th>';
                    echo '<th>e_mail</th>';
                    echo '<th>numero_telephone</th>';
                    echo '<th>action</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["id"] . '</td>';
                        echo '<td>' . $row["nom"] . '</td>';
                        echo '<td>' . $row["prenom"] . '</td>';
                        echo '<td>' . $row["e_mail"] . '</td>';
                        echo '<td>' . $row["numero_telephone"] . '</td>';
                        // Vérifier l'état du compte (0 pour bloqué, 1 pour actif par défaut)
                    if ($row["status"] == 0) {
                            // Si le compte est bloqué, afficher le bouton de déblocage avec les classes Bootstrap
                            echo '<td><button class="btn btn-success" onclick="deblockUser(' . $row["id"] . ')">Débloquer</button></td>';
                        } else {
                            // Si le compte est actif, afficher le bouton de blocage avec les classes Bootstrap
                            echo '<td><button class="btn btn-danger" onclick="blockUser(' . $row["id"] . ')">Bloquer</button></td>';
                        }
                        
                     echo '</tr>';


                } 
                echo '</tbody>';
                echo '</table>';
            }
                else {
                    echo "0 results";
                }
            

                // Fermer la connexion à la base de données
                $conn->close();
                ?>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
