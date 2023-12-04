<?php
    session_start();
    include ("db_connect.php");
    
    if(isset($_GET) && $_GET && $_GET['service_id']){
        $sql = "SELECT * FROM `services` WHERE `service_id` = " . $_GET['service_id'] . ";";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $service = $result->fetch_assoc();
            print_r($service);
        }else{
            header("Location: index.php");
            die;
        }
    }else{
        header("Location: index.php");
        die;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include("db_connect.php");

        $image = $_POST['image'];
        $date = $_POST['date'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sql = "SELECT id_commentaire, id_utilisateur, text, date_commentaire, nom, prenom, image 
                FROM commentaire 
                INNER JOIN user ON commentaire.id_utilisateur = user.id";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $image, $date, $nom, $prenom);
        $stmt->execute();
        $result = $stmt->get_result();

        // Traite le résultat si nécessaire
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            }
        }
    }
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
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4"><?= $service['title'] ?></h1>
            </div>
        </div>
    </div>

    <div class="container-fluid p-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="mb-5">
                    <img class="img-fluid w-100 rounded mb-5" src="<?= $service['image'] ?>" alt="">
                    <p>S<?= $service['description'] ?></p>    
                </div>
            </div>
        </div>
    </div>
   <?php
   include "footer.php";
   ?>
</body>

</html>