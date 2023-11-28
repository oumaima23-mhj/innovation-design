<?php
session_start();
if(isset($_SESSION['server_url'])) {
    header("location: /innovation-design/acceuil.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "innovation_design";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }
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
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="acceuil.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <img src="oumayma.png" style="max-width: 80px; max-height: 80px;" >
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-secondary d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <h6 class="mb-0">oumaymamhj83@gmail.com</h6>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <h6 class="mb-0">+21651125770</h6>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                <div class="d-inline-flex align-items-center py-2">
                    <a class="btn btn-light btn-square rounded-circle me-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-light btn-square rounded-circle me-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="btn btn-light btn-square rounded-circle me-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                <a href="acceuil.php" class="navbar-brand d-block d-lg-none">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="acceuil.php" class="nav-item nav-link active">acceuil</a>
                        <a href="a propos.php" class="nav-item nav-link">a propos</a>
                        <a 
                        <?php if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {echo"hidden";}?>
                        href="compte.php" class="nav-item nav-link">compte</a> 
                        <a  href="contact.php" class="nav-item nav-link">contact</a>
                        <?php 
    if(!isset($_SESSION["id"]) || empty($_SESSION["id"])) { ?>
        <a href="login.php" class="nav-item nav-link">login</a>
<?php } else { ?>
        <a href="logout.php" class="nav-item nav-link">logout</a>
<?php } ?>                      <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">services</a>
                            <div class="dropdown-menu rounded-0 m-0">
                            <?php if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) { ?>
    <a href="services/dlogo.php" class="dropdown-item active">demande logo</a>
    <a href="services/dflayer.php" class="dropdown-item">demande flyers</a>
    <a href="services/dcv.php" class="dropdown-item">demande carte visite</a>
    <a href="services/daffiche.php" class="dropdown-item">demande des affiches</a>
    <a href="services/dpub.php" class="dropdown-item">demande publicités</a>
<?php } else { ?>
    <a href="logo.php" class="dropdown-item active">services logo</a>
    <a href="flayer.php" class="dropdown-item">service flyers</a>
    <a href="cv.php" class="dropdown-item">service carte visite</a>
    <a href="affiche.php" class="dropdown-item">service des affiches</a>
    <a href="pub.php" class="dropdown-item">service publicités</a>
<?php } ?>
                            </div>
                        </div>
                        
                        </div>
        
                </div>
            </nav>
        </div>
    </div>
</div>
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4">a propos</h1>
              
            </div>
        </div>
    </div>

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
                    <div class="d-flex mb-4">
                        <img src="img/img3.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6><a href="">moezbhk</a> <small><i>01 Jan 2022</i></small></h6>
                            <p>Nous avons fait appel à cette société de design pour créer des flyers pour notre événement et nous avons été impressionnés par leur créativité et leur professionnalisme. Les designs étaient modernes et attrayants, et ont contribué à attirer un grand nombre de participants à notre événement. Nous recommandons fortement cette entreprise pour tous vos besoins de design graphique.</p>
                            <button class="btn btn-sm btn-secondary">Repondre</button>
                        </div>
                    </div>
                    <div class="d-flex ms-5 mb-4">
                        <div class="ps-3">
                            <h3> Connectez-vous pour pouvoir commenter". ?</h3>
                            <a href="login.php" class="btn btn-primary">login</a>
                            <br><br>
                            <form>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <textarea class="form-control bg-light border-0 px-4 py-3" cols="100" rows="4" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary py-3" type="submit">Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container-fluid bg-dark text-secondary px-5 mt-5">
        <div class="row gx-5">
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">entrer en contact</h4>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">4070 M'saken sousse tunisie</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">oumaimamhj@gmail.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">+21652442327</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">liens rapides</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>acceuil</a>
                            <a class="text-secondary" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contactez-nous</a>
                        </div>
                    </div>
                   
                </div>
            </div>
        
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 py-lg-0 px-5" style="background: #111111;">
        <div class="row gx-5">
            <div class="col-lg-8">
                <div class="py-lg-4 text-center">
                    <p class="text-secondary mb-0">&copy; <a class="text-light fw-bold" href="#">innovation design</a>. 2023 All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>