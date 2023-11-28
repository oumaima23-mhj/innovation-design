<?php
// Start the session
session_start();

$error = False;
if ($_POST){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "innovation_design";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `user` where `e_mail`='" . $_POST['e-mail'] . "' and `password`='" . $_POST['pass'] . "';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set session variables
        $_SESSION["id"] = true;

        header("location: /innovation-design/acceuil.php");
        die();
    } else {
        $error = True;
    }
    $conn->close();
}

?>

<style>
    /* Style du conteneur principal */
.formulaire {
  width: 300px;
  margin: 0 auto;
  background-color: #3498db;
  padding: 20px;
  border-radius: 5px;
}

/* Style pour les éléments de saisie */
.group-form {
  margin-bottom: 15px;
  position: relative;
}

input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #ecf0f1;
}

/* Style pour les icônes */
.icon-mail,
.icon-password {
  position: absolute;
  top: 13px;
  left: 10px;
  color: #3498db;
}

/* Style pour le bouton de soumission */
.inscription {
  background-color: #fff;
  color: dark;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}



/* Changer la couleur du texte des placeholders */
input[type="email"]::placeholder,
input[type="password"]::placeholder {
  color: #7f8c8d;
}

/* Style pour les sauts de ligne <br> */
form br {
  display: none;
}
</style>
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
        <a href="a propos.php" class="nav-item nav-link">apropos</a>
        <a href="compte.php" class="nav-item nav-link">compte</a>
        <a href="contact.php" class="nav-item nav-link">contact</a>
        <?php 
    if(!isset($_SESSION["id"]) || empty($_SESSION["id"])) { ?>
        <a href="login.php" class="nav-item nav-link">login</a>
<?php } else { ?>
        <a href="logout.php" class="nav-item nav-link">logout</a>
<?php } ?>

        <div class="nav-item dropdown">
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
<br>
      <form action="login.php" method="POST" class="formulaire">
        <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert">
              login incorrect
            </div>
        <?php } ?>
        <div class="group-form">
          <input type="email" name="e-mail" placeholder="e-mail">
          <div class="icon-mail"></div>
        </div><br>
        <div class="group-form">
          <input type="password"  name="pass" placeholder="password">
          <div class="icon-password"></div>
        </div><br>
        <div class="group-form">
          <input type="submit" class="inscription" value="login">
          <a href="compte.php"><input type="button" class="inscription" value="inscription"></a>
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