<?php
    session_start();
    include("db_connect.php");
    if(isset($_GET['search']) && $_GET['search']) {
        $search = $_GET['search'];
        $sql = "SELECT * FROM services WHERE title LIKE '%" . $search . "%'";
    } else {
        $sql = "SELECT * FROM services";
    }
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>innovation design</title>
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
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style> 
        input[type=text] {
        width: 130px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-image: url('searchicon.png');
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
        width: 100%;
        }
    </style>
    <script id=alert>
function myFunction() {
  alert("aucun resultat!");
}
</script>
</head>

<body>
<?php
include "nav.php" ;
?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                         
                            <h1 class="display-2 text-white text-uppercase mb-md-4">Logos professionnels pour votre entreprise </h1>
        
                            <a href="" class="btn btn-light py-md-3 px-md-5">Contactez-nous</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            
                            <h1 class="display-2 text-white text-uppercase mb-md-4"> Commandez en ligne dès maintenant sur notre site web</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">abonnez-vous</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5">Contactez-nous</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid p-5">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4">
                   <h1 class="display-3 text-uppercase mb-0">bienvenu a ino design</h1>
                </div>
                <p class="mb-4">Notre site web ropose une grande sélection de designs professionnels pour les entreprises de tous les secteurs. Nos logos,affiches , flayers, pub sont créés par des designers expérimentés et peuvent être personnalisés pour répondre aux besoins spécifiques de votre entreprise. Nous offrons également des options de tarification flexibles pour s'adapter à tous les budgets. Commandez en ligne facilement et obtenez votre nouveau logo en quelques jours seulement. Faites un pas en avant pour donner à votre entreprise une image professionnelle avec une qualité supérieure de notre site web .</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Programe Start -->
    <div class="container-fluid programe position-relative px-5 mt-5" style="margin-bottom: 135px;">
        <form action="index.php" method="GET">
            <input type="text" name="search" placeholder="Search"/>
            <input type="submit" value="Search"/>
        </form>
        <div class="row g-5 gb-5">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="bg-light rounded text-center p-5">
                            <img src="<?= $row['image'] ?>" style="max-width: 200px; max-height: 200px;" alt="" srcset=""> 
                            <h3 class="text-uppercase my-4"><?= $row["title"] ?></h3>                  
                            <p><?= $row["description"] ?></p>
                            <a class="text-uppercase" href="service-single.php?service_id=<?= $row["service_id"] ?>">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                <?php }
            } else {
        
            }
            $conn->close();
        ?>
        </div>
    </div>
    <!-- Programe Start -->
    <!-- Team Start -->
    <div class="container-fluid p-5">
        <div class="mb-5 text-center">
            <h5 class="text-primary text-uppercase">voici notre équipe</h5>
            <h1 class="display-3 text-uppercase mb-0">formateurs experts</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded">
                        <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute start-0 bottom-0 w-100 rounded-bottom text-center p-4" style="background: #0841d3e6;">
                        <h5 class="text-uppercase text-light">John Deo</h5>
                        <p class="text-uppercase text-secondary m-0">expert</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded">
                        <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute start-0 bottom-0 w-100 rounded-bottom text-center p-4" style="background: #0841d3e6;">
                        <h5 class="text-uppercase text-light">James Taylor</h5>
                        <p class="text-uppercase text-secondary m-0">expert</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded">
                        <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute start-0 bottom-0 w-100 rounded-bottom text-center p-4" style="background: #0841d3e6;">
                        <h5 class="text-uppercase text-light">Adam Phillips</h5>
                        <p class="text-uppercase text-secondary m-0">expert</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    

    <!-- Testimonial Start -->
    <div class="container-fluid p-0 my-5">
        <div class="row g-0">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="img/testimonial.jpg">
                </div>
            </div>
            <div class="col-lg-6 bg-dark p-5">
                <div class="mb-5">
                    <h1 class="display-3 text-uppercase text-light mb-0">nos client disent</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item">
                        <p class="fs-4 fw-normal text-light mb-4"><i class="fa fa-quote-left text-primary me-3"></i>"J'ai travaillé avec la société innovation design de création d'affiches, logos et flyers pour développer une campagne publicitaire pour mon entreprise. Ils ont été incroyablement créatifs et professionnels dans leur approche, et ont aidé à créer des designs accrocheurs qui ont vraiment fait ressortir mon entreprise. Je recommande fortement leur travail à tous ceux qui cherchent à améliorer leur image de marque."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="img/testimonial-1.jpg" alt="">
                            <div class="ps-4">
                                <h5 class="text-uppercase text-light">Client Name</h5>
                
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <p class="fs-4 fw-normal text-light mb-4"><i class="fa fa-quote-left text-primary me-3"></i>"J'ai eu l'occasion de travailler avec cette société pour créer des designs pour mon entreprise. Ils ont été très réactifs à toutes mes demandes et ont créé des designs incroyablement professionnels qui ont vraiment aidé à améliorer l'image de marque de mon entreprise. Je recommande vivement cette société à tous ceux qui cherchent à améliorer leur image de marque.".</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="img/testimonial-2.jpg" alt="">
                            <div class="ps-4">
                                <h5 class="text-uppercase text-light">Client Name</h5>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    
        </div>
        </div>
<?php
include "footer.php" ;
?>
</body>

</html>