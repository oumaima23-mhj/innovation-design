<?php
    if ($_POST){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "innovation_design";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $numero_telephone = $_POST['numero_telephone'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        $sql = "INSERT INTO `user`(`nom`, `prenom`, `e_mail`, `password`, `numero_telephone`) VALUES ('" . $nom . "','" . $prenom . "','" . $email . "','" . $mot_de_passe . "','" . $numero_telephone . "')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: /login.php");
            die(); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>
<html>
<head>
    <style>
    /*
    default element
*/
body{
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    color: #707070;
}

a{
    text-decoration: none;
}

/*
    container & global élément of container
*/
.container{
    display: flex;
    flex-direction: column;
}

#connexion, #inscription{
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.title{
    font-size: 2.7em;
    margin: 0;
}
.paragraphe{
    margin: 20px 0;
}
.paragraphe{
    opacity: 0.81;
    font-size: 18px;
}
.btn-link, input[type="submit"]{
    display: block;
    line-height: 60px;
    border: 1px solid  #fff;
    width: 230px;
    height: 60px;
    text-align: center;
    border-radius: 9999px;
    color: #fff;
    font-size: 20px;
    font-weight: lighter;
    transition: .2s;
    cursor: pointer;
}
/*
    connexion
*/
#connexion{
    background: #0841d3e6;
    text-align: center;
}

#connexion .title{
    color: #fff;
}

#connexion .paragraphe{
    color: #fff;
    
}
#connexion .connexion:hover{
    background-color: #fff;
    color: #0841d3e6;
}
/*
    inscription
*/

#inscription .title{
    color: #0841d3e6;
}


.group-form{
    margin-bottom: 10px;
    position: relative;
}

.group-form > div{
    position: absolute;
    width: 40px;
    height: 40px; 
    top: 2px;
    left: 3px;
    
}

.group-form .icon-user{
    background: url(../images/user.png);
    background-size: cover;
    background-position: center;
    
}

.group-form .icon-mail{
    background: url(../images/mail.png);
    background-size: cover;
    background-position: center;
}

.group-form .icon-password{
    background: url(../images/password.png);
    background-size: cover;
    background-position: center;
}

.group-form input[type="text"],
.group-form input[type="email"],
.group-form input[type="password"]{
    width: 250px;
    height: 40px;
    border: 1px solid #707070;
    border-radius: 9999px;
    padding-left: 15px;
    outline: none;
    font-size: 16px;
}

#inscription .inscription{
    background: #0841d3e6;
    margin: 0 auto;
}

#inscription .inscription:hover{
    background: #fff;
    color: #0841d3e6;
    border: 1px solid #0841d3e6;
}

@media (min-width: 992px){
    .container{
        flex-direction: row;
    }

    #connexion{
        width: 45%;
        text-align: center;
    }

    #inscription{
        width: 55%;
    }
}
    </style>
 <link href="css/style.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    </head>

<body>
    <!-- Header Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="acceuil.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
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
                        <a href="compte.php" class="nav-item nav-link">compte</a>
                        <a href="contact.php" class="nav-item nav-link">contact</a>
                        <?php 
    if(!isset($_SESSION["id"]) || empty($_SESSION["id"])) { ?>
        <a href="login.php" class="nav-item nav-link">login</a>
<?php } else { ?>
        <a href="logout.php" class="nav-item nav-link">logout</a>
<?php } ?>                      <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">services</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="logo.php" class="dropdown-item active">services logo</a>
                                <a href="flayer.php" class="dropdown-item">service flyers</a>
                                <a href="cv.php" class="dropdown-item">service carte visite</a>
                                <a href="affiche.php" class="dropdown-item">service des affiches</a>
                                <a href="pub.php" class="dropdown-item">service publicités</a>
                            </div>
                        </div>
                        
                        </div>
            
                </div>
            </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->
<div class="container">
    <div id="connexion">
      <h1 class="title">BIENVENU </h1>
      <p class="paragraphe">
        Veuillez entrer vos details personnel et demarrez votre journee sur ino design
      </p>
      <form method="post" action="login.php">
      <a href="login.php" class="btn btn-primary py-md-3 px-md-5 me-3">se connecter</a>
    </form>
    </div>
    <div id="inscription">
      <h1 class="title">Creer un compte</h1>
      <p class="paragraphe">
        Veuillez remplir tous les champs
      </p>
      <form class="formulaire" method="POST" action="login.php">
        <div class="group-form">
          <input type="text" placeholder="Nom" name="nom">
          <div class="icon-user"></div>
        </div>
        <div class="group-form">
          <input type="text" placeholder="prenom" name="prenom">
          <div class="icon-user"></div>
        </div>
        <div class="group-form">
          <input type="text" placeholder="numero téléphone" name="numero_telephone">
          <div class="icon-user"></div>
        </div>
        <div class="group-form">
          <input type="email" placeholder="e-mail" name="email">
          <div class="icon-mail"></div>
        </div>
        <div class="group-form">
          <input type="password" placeholder="password" name="mot_de_passe">
          <div class="icon-password"></div>
        </div>
        <div class="group-form">
          <input type="submit" class="inscription" value="S'inscrire">
        </div>
      </form>
    </div>
  </div>
  
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
                        </div>.
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
    </div>
    <!-- Footer End -->

    

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
