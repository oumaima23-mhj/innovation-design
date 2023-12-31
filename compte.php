<?php
if (!empty($_SESSION["id"])) { 
    header("location: /innovation-design/index.php");
    exit; // Terminer l'exécution du script après la redirection
}

?>
<html>
<head>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
        color: #707070;
    }

    a {
        text-decoration: none;
    }

    /*
    container & global élément of container
*/
    .container {
        display: flex;
        flex-direction: column;
    }

    #connexion,
    #inscription {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .title {
        font-size: 2.7em;
        margin: 0;
    }

    .paragraphe {
        margin: 20px 0;
    }

    .paragraphe {
        opacity: 0.81;
        font-size: 18px;
    }

    .btn-link,
    input[type="submit"] {
        display: block;
        line-height: 60px;
        border: 1px solid #fff;
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
    #connexion {
        background: #0841d3e6;
        text-align: center;
    }

    #connexion .title {
        color: #fff;
    }

    #connexion .paragraphe {
        color: #fff;

    }

    #connexion .connexion:hover {
        background-color: #fff;
        color: #0841d3e6;
    }

    /*
    inscription
*/

    #inscription .title {
        color: #0841d3e6;
    }


    .group-form {
        margin-bottom: 10px;
        position: relative;
    }

    .group-form>div {
        position: absolute;
        width: 40px;
        height: 40px;
        top: 2px;
        left: 3px;

    }

    .group-form .icon-user {
        background: url(../images/user.png);
        background-size: cover;
        background-position: center;

    }

    .group-form .icon-mail {
        background: url(../images/mail.png);
        background-size: cover;
        background-position: center;
    }

    .group-form .icon-password {
        background: url(../images/password.png);
        background-size: cover;
        background-position: center;
    }

    .group-form input[type="text"],
    .group-form input[type="email"],
    .group-form input[type="password"] {
        width: 250px;
        height: 40px;
        border: 1px solid #707070;
        border-radius: 9999px;
        padding-left: 15px;
        outline: none;
        font-size: 16px;
    }

    #inscription .inscription {
        background: #0841d3e6;
        margin: 0 auto;
    }

    #inscription .inscription:hover {
        background: #fff;
        color: #0841d3e6;
        border: 1px solid #0841d3e6;
    }

    @media (min-width: 992px) {
        .container {
            flex-direction: row;
        }

        #connexion {
            width: 45%;
            text-align: center;
        }

        #inscription {
            width: 55%;
        }
    }
    </style>
    <link href="css/style.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
</head>

<body>
    <?php
include "nav.php" ;
?>
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
            <form class="formulaire" method="POST" action="insertUser.php">
                <?php if(isset($_SESSION['erreurs']) && in_array("Le champ Nom est vide.", $_SESSION['erreurs'])) {
            echo "<div class='error'>Le champ Nom est vide.</div>";
            } ?>
                <div class="group-form">
                    <input type="text" placeholder="Nom" name="nom"
                        value="<?php if(isset($_GET['nom'])) { echo $_GET['nom']; } ?>">
                    <div class="icon-user"></div>
                </div>
                <?php if(isset($_SESSION['erreurs']) && in_array("Le champ Prénom est vide.", $_SESSION['erreurs'])) {
            echo "<div class='error'>Le champ Prénom est vide.</div>";
        } ?>
                <div class="group-form">
                    <input type="text" placeholder="Prénom"
                        value='<?php if(isset($_GET['prenom'])) { echo $_GET['prenom']; } ?>' name="prenom">
                    <div class="icon-user"></div>
                </div>
                <?php if(isset($_SESSION['erreurs']) && in_array("Le champ Numéro de téléphone est vide.", $_SESSION['erreurs'])) {
            echo "<div class='error'>Le champ Numéro de téléphone est vide.</div>";
        } ?>
                <div class="group-form">
                    <input type="text" value='<?php if(isset($_GET['tel'])) { echo $_GET['tel']; } ?>'
                        placeholder="Numéro de téléphone" name="numero_telephone">
                    <div class="icon-user"></div>
                </div>
                <?php if(isset($_SESSION['erreurs']) && in_array("Le champ E-mail est vide.", $_SESSION['erreurs'])) {
            echo "<div class='error'>Le champ E-mail est vide.</div>";
        } ?>
                <?php if(isset($_SESSION['erreurs']) && in_array("L'adresse e-mail n'est pas valide.", $_SESSION['erreurs'])) {
            echo "<div class='error'>L'adresse e-mail n'est pas valide.</div>";
        } ?>
                <div class="group-form">
                    <input type="email" value="<?php if(isset($_GET['email'])) { echo $_GET['email']; } ?>"
                        placeholder="E-mail" name="e_mail">
                    <div class="icon-mail"></div>
                </div>
                <?php if(isset($_SESSION['erreurs']) && in_array("Le champ Mot de passe est vide.", $_SESSION['erreurs'])) {
            echo "<div class='error'>Le champ Mot de passe est vide.</div>";
    } ?>
                <div class="group-form">
                    <input type="password" placeholder="Mot de passe" name="password">
                    <div class="icon-password"></div>
                </div>
                <div class="group-form">
                    <input type="submit" class="inscription" value="S'inscrire">
                </div>
            </form>
        </div>
    </div>

    <?php include "footer.php" ;
    $erreurs = isset($_SESSION['erreurs']) ? $_SESSION['erreurs'] : array();
   unset($_SESSION['erreurs']);
    ?>

</html>