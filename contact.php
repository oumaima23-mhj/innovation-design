<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innovation_design";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification des données envoyées depuis le formulaire
    if (
        isset($_POST['nom']) &&
        isset($_POST['email']) &&
        isset($_POST['sujet']) &&
        isset($_POST['message_client'])
    ) {
        // Récupération des données du formulaire
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $message_client = $_POST['message_client'];

        // Insertion des données dans la base de données
        $sql = "INSERT INTO contact (nom, e_mail, sujet, message_client) VALUES (:nom, :email, :sujet, :message_client)";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nom", $nom);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":sujet", $sujet);
            $stmt->bindParam(":message_client", $message_client);
            $stmt->execute();

            // Redirection après l'envoi du formulaire
            header("Location: contact.php?status=success");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ino design </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
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
        <?php include "nav.php" ; ?>
            <div class="container-fluid bg-primary p-5 bg-hero mb-5">
                <div class="row py-5">
                    <div class="col-12 text-center">
                        <h1 class="display-2 text-uppercase text-white mb-md-4">Contact</h1>
                        <form method="post" action="compte.php">
                            <?php if(!isset($_SESSION["id"]) || empty($_SESSION["id"])) { ?>
                                <a href="compte.php" class="btn btn-primary py-md-3 px-md-5 me-3">s'inscrire</a>
                                <a href="compte.php" class="btn btn-light py-md-3 px-md-5">Contact</a>
                            <?php }?>
                        <form>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-5">
                <div class="mb-5 text-center">
                    <h5 class="text-primary text-uppercase">Contactez-nous</h5>
                    <h1 class="display-3 text-uppercase mb-0">entrer en contact</h1>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-4">
                        <div class="d-flex flex-column align-items-center bg-dark rounded text-center py-5 px-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-map-marker-alt fs-4 text-white"></i>
                            </div>
                            <h5 class="text-uppercase text-primary">Visite</h5>
                            <p class="text-secondary mb-0">4070 M'saken sousse tunisia</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-column align-items-center bg-dark rounded text-center py-5 px-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-envelope fs-4 text-white"></i>
                            </div>
                            <h5 class="text-uppercase text-primary">Email </h5>
                            <p class="text-secondary mb-0">oumaymamhj83@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-column align-items-center bg-dark rounded text-center py-5 px-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone fs-4 text-white"></i>
                            </div>
                            <h5 class="text-uppercase text-primary">appelons-nous</h5>
                            <p class="text-secondary mb-0">+21651125770</p>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="bg-dark p-5">
                            <form action="contact.php" method="post" data-status="init">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="votre nom" style="height: 55px;">
                                    </div>
                                    <div class="col-6">
                                        <input type="email" class="form-control bg-light border-0 px-4" placeholder="votre adresse e-mail" style="height: 55px;">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="sujet" style="height: 55px;">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">envoyer Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51824.4579477767!2d10.547131667788765!3d35.725514607789464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fdf5b7aa14bf95%3A0x533a5c49ccdec61a!2sM&#39;saken!5e0!3m2!1sfr!2stn!4v1674679595588!5m2!1sfr!2stn"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <?php include "footer.php" ;  ?>
        </div>
    </body>
</html>