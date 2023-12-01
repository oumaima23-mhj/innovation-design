<?php
session_start();
// Votre code de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innovation_design";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie si la connexion a échoué
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour sélectionner les commentaires depuis la base de données
$sql = "SELECT * FROM commentaire";

$result = $conn->query($sql);



// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le champ de commentaire n'est pas vide
    if (!empty($_POST["comment"])) {
        // Récupère les données du formulaire
        $nom_utilisateur = $_SESSION["user"]; // Utilisez la valeur de la session pour le nom d'utilisateur
        $commentaire = $_POST["comment"];
        $rating = $_POST["rating"]; // Assurez-vous d'avoir une variable $rating récupérée du formulaire

        // Préparez la requête SQL pour insérer le commentaire dans la base de données
        $sql = "INSERT INTO commentaire (nom, date, comment, rating) VALUES ('$nom_utilisateur', NOW(), '$commentaire', '$rating')";

        // Exécute la requête SQL
        if ($conn->query($sql) === TRUE) {
            echo "Commentaire ajouté avec succès.";
        } 
        $conn->close();

}}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ino design</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href="img/favicon.ico" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="google.css" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php
include "nav.php" ;
?>

    <div class="container-fluid p-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="mb-5">
                    <img class="img-fluid w-100 rounded mb-5" src="img/blog-1.jpg" alt="">
                    Notre entreprise de design graphique se spécialise dans la création de logos, de flyers, de publicités, de cartes de visite et d'affiches. Nous collaborons avec des clients de différents secteurs pour développer des designs uniques et efficaces qui reflètent leur image de marque et leur message. Nous utilisons les dernières tendances et technologies pour créer des designs de qualité professionnelle qui se démarquent de la concurrence. Nous aimons travailler en étroite collaboration avec nos clients pour comprendre leurs besoins et créer des designs qui répondent à leurs objectifs commerciaux.</p>
                    <p>Notre équipe de designers expérimentés possède une grande expertise dans la création de designs visuels impactants qui attirent l'attention et suscitent l'intérêt. Nous nous engageons à offrir un service personnalisé et à écouter les besoins de nos clients pour garantir qu'ils sont entièrement satisfaits du résultat final. Nous nous tenons à jour des dernières tendances de design et de communication pour nous assurer que nos créations soient toujours innovantes et pertinentes. Nous croyons que le design est un élément clé pour toute entreprise qui souhaite se démarquer et réussir sur le marché.</p>
                    <p>En somme, notre entreprise de design graphique est là pour aider les entreprises à se démarquer en créant des designs professionnels, uniques et efficaces qui reflètent leur image de marque. Nous sommes passionnés par le design et nous nous engageons à offrir un service personnalisé et à écouter les besoins de nos clients pour garantir qu'ils sont entièrement satisfaits des résultats.</p>
                </div>
                <div class="mb-5">
                    <div class="d-flex mb-4">
                        <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6><a href="">aminemahj</a> <small><i>28 Jan 2023</i></small></h6>
                            <p>Notre entreprise a fait appel aux services de cette société de design graphique pour créer notre logo et nous sommes absolument ravis du résultat! Les designers ont compris notre vision et ont su créer un logo qui reflète parfaitement notre image de marque. Le processus de création a été fluide et professionnel, et nous avons apprécié leur engagement à nous écouter et à répondre à nos besoins.</p>
                            <button class="btn btn-sm btn-secondary">Repondre</button>
                            
                        </div>
                    </div>

<?php
if ($result->num_rows > 0) {
    // Affichage des commentaires s'ils existent
    while($row = $result->fetch_assoc()) {        
        echo('<div class="d-flex mb-4">
        <img src="img/img3.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">');
        echo('  <div class="ps-3">
        <h6><a href="">'.$row["nom"].'</a> <small><i>'.$row["date"].'</i></small></h6>');
        echo('
        <p>5/'.$row["rating"].' : '.$row["comment"].'</p>
                            <button class="btn btn-sm btn-secondary">Repondre</button>
                        </div>
                    </div>
                    ');
        echo('');
        echo('');
        echo('');

    
    
    }
} else {
    echo "Aucun commentaire trouvé.";
}
?>



                    
                      
                            
                    <div class="d-flex ms-5 mb-4">
                        <div class="ps-3">
                        <?php 
                        if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) { ?>
                            <h3> Connectez-vous pour pouvoir commenter". ?</h3>
                            <a href="login.php" class="btn btn-primary">login</a>
            <?php }?>
                           
                            <style>
        .rating-card {
            max-width: 33rem;
            background: #fff;
            margin: 0 1rem;
            padding: 1rem;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            width: 100%;
            border-radius: 0.5rem;
        }

        .rating-star {
            font-size: 10vh;
        }

        .one {
            color: rgb(255, 0, 0);
        }

        .two {
            color: rgb(255, 106, 0);
        }

        .three {
            color: rgb(251, 255, 120);
        }

        .four {
            color: rgb(255, 255, 0);
        }

        .five {
            color: rgb(24, 159, 14);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
<form method="post" action="a-propos.php">
    <br><br>
    <div class="rating-card">
        <br />
        <span onclick="gfg(1)" class="rating-star">★</span>
        <span onclick="gfg(2)" class="rating-star">★</span>
        <span onclick="gfg(3)" class="rating-star">★</span>
        <span onclick="gfg(4)" class="rating-star">★</span>
        <span onclick="gfg(5)" class="rating-star">★</span>
        <h3 id="output">Rating : 0/5</h3>
        <!-- Ajout du champ pour l'évaluation (rating) -->
        <input type="hidden" name="rating" id="rating" value="0">
    </div>
    <br><br>
    <div class="row g-3">
        <div class="col-12">
            <textarea name="comment" class="form-control bg-light border-0 px-4 py-3" cols="100" rows="4" placeholder="Message"></textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-primary py-3" type="submit">Comment</button>
        </div>
    </div>
</form>

<script>
    // script.js 
    let stars = document.getElementsByClassName("rating-star");
    let output = document.getElementById("output");

    function gfg(n) {
        remove();
        for (let i = 0; i < n; i++) {
            let cls = "";
            if (n == 1) cls = "one";
            else if (n == 2) cls = "two";
            else if (n == 3) cls = "three";
            else if (n == 4) cls = "four";
            else if (n == 5) cls = "five";
            stars[i].className = "rating-star " + cls;
        }
        output.innerText = "Rating is: " + n + "/5";
        // Mettre à jour la valeur du champ rating dans le formulaire
        document.getElementById("rating").value = n;
    }

    function remove() {
        for (let i = 0; i < stars.length; i++) {
            stars[i].className = "rating-star";
        }
    }
</script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
        <?php
include "footer.php" ;
?>
</body>

</html>