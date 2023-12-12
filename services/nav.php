<head>
    <meta charset="utf-8">
    <title>ino design</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="../google.css" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
  
  <!-- Header Start -->
  <div class="container-fluid bg-dark px-0">
      <div class="row gx-0">
          <div class="col-lg-3 bg-dark d-none d-lg-block">
              <a href="../index.php"
                  class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                  <img src="../oumayma.png" style="max-width: 80px; max-height: 80px;">
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
                  <a href="index.php" class="navbar-brand d-block d-lg-none"></a>
                  <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                      data-bs-target="#navbarCollapse">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                      <div class="navbar-nav mr-auto py-0">
                          <a href="../index.php" class="nav-item nav-link">acceuil</a>
                          <a href="../a-propos.php" class="nav-item nav-link">a propos</a>
                          <div class="nav-item dropdown">
                              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">services</a>
                              <div class="dropdown-menu rounded-0 m-0">
                                  <?php if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) { ?>
                                  <a href="dlogo.php" class="dropdown-item">demande logo</a>
                                  <a href="dflayer.php" class="dropdown-item">demande flyers</a>
                                  <a href="dcv.php" class="dropdown-item">demande carte visite</a>
                                  <a href="daffiche.php" class="dropdown-item">demande des affiches</a>
                                  <a href="dpub.php" class="dropdown-item">demande publicités</a>
                                  <?php } else { ?>
                                  <a href="logo.php" class="dropdown-item">services logo</a>
                                  <a href="flayer.php" class="dropdown-item">service flyers</a>
                                  <a href="cv.php" class="dropdown-item">service carte visite</a>
                                  <a href="affiche.php" class="dropdown-item">service des affiches</a>
                                  <a href="pub.php" class="dropdown-item">service publicités</a>
                                  <?php } ?>
                              </div>
                          </div>
                          <a href="../contact.php" class="nav-item nav-link">contact</a>
                          <?php if(!isset($_SESSION["id"]) || empty($_SESSION["id"])) { ?>
                          <a href="../login.php" class="nav-item nav-link">login</a>
                          <a href="../compte.php" class="nav-item nav-link">compte</a>
                          <?php } else { ?>
                          <a href="../logout.php" class="nav-item nav-link">logout</a>
                          <?php } ?>
                      </div>
                  </div>
              </nav>
          </div>
      </div>
  </div>