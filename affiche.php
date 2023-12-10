  <!DOCTYPE html>
<html lang="en">
<?php
$cat=3;
?>
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
   <?php
    include "nav.php" ;
   ?>
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4">notre affiche</h1>
                
            </div>
        </div>
    </div>
    <div class="container-fluid p-5">
        <div class="row g-5">
            <!-- Blog list Start -->
            <div class="col-lg-8">
                <div class="row g-5">
                    <div class="col-md-6">
                        <div class="blog-item">
                            <div class="position-relative overflow-hidden rounded-top">
                                <img class="img-fluid" src="affiche/f1.webp" alt="">
                            </div>
                          
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-item">
                            <div class="position-relative overflow-hidden rounded-top">
                                <img class="img-fluid" src="affiche/f2.jpg" alt="">
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-item">
                            <div class="position-relative overflow-hidden rounded-top">
                                <img class="img-fluid" src="affiche/f5.jpeg" alt="">
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-item">
                            <div class="position-relative overflow-hidden rounded-top">
                                <img class="img-fluid" src="affiche/f6.jpg" alt="">
                            </div>
                        </div>   
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