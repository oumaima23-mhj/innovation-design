
<!DOCTYPE html>

<?php
session_start();
?>
<head>
    
<head>
    <meta charset="utf-8">
    <title>ino design Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="google.css" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

<body>

<?php
include "nav.php" ;
?>


    <h1>Demande de Publicité</h1>
        <form action="creation/dpub.php" method="post">

            <div class="row g-3">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Nom de l'entreprise / Organisation" name="nom_entreprise" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Contact principal" name="contact_principal" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="tel" class="form-control bg-light border-0 px-4" placeholder="Téléphone" name="telephone" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="email" class="form-control bg-light border-0 px-4" placeholder="Adresse e-mail" name="email" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Type de publicité souhaité" name="type_publicite" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Objectif de la publicité" name="objectif_publicite" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Public cible" name="public_cible" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Format de la publicité" name="format_publicite" required>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Texte principal" name="texte_principal" required></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="date" class="form-control bg-light border-0 px-4" placeholder="Date de diffusion souhaitée" name="date_diffusion" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Budget prévu pour la publicité" name="budget_publicite" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Canal de diffusion préféré" name="canal_diffusion" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Remarques ou commentaires additionnels" name="remarques"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary w-100 py-3" type="submit">Envoyer la demande</button>
                    </div>
                </div>
            </div>
        </form>


      <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary px-5 mt-5">
        <div class="row gx-5">
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">entrer en contact</h4>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">4070 M'saken-sousse-tunisia</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">oumaymamhj83@gmail.com</p>
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
    <div class="container-fluid py-4 py-lg-0 px-5" style="background: #111111;">
        <div class="row gx-5">
            <div class="col-lg-8">
                <div class="py-lg-4 text-center">
                    <p class="text-secondary mb-0">&copy; <a class="text-light fw-bold" href="#">innovation design</a>. 2023 All Rights Reserved.</p>
                </div>
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
</body>
   
</html>
