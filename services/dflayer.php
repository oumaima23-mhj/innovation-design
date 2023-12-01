
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

    <h1>Demande de Flyer</h1>
        <form action="creation/dflayer.php" method="post">

            <div class="row g-3">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Nom de l'événement / de la campagne" name="nom_evenement" required>
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
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Objectif du flyer" name="objectif_flyer" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Public cible" name="public_cible" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Format du flyer" name="format_flyer" required>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Texte principal" name="texte_principal" required></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="date" class="form-control bg-light border-0 px-4" placeholder="Date de distribution souhaitée" name="date_distribution" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Budget prévu pour la conception du flyer" name="budget_flyer" required>
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

</div>
</div>
        <?php
include "../footer.php" ;
?>
</body>
   
</html>
