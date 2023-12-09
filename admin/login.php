<!DOCTYPE html>
<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs email et mot de passe ne sont pas vides
    if (!empty($_POST['inputEmail']) && !empty($_POST['inputPassword'])) {
        // Récupérer les valeurs soumises par le formulaire
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];

        // Ici, vous pouvez ajouter la logique de validation du nom d'utilisateur et du mot de passe, par exemple, en vérifiant dans une base de données
        // Exemple de validation basique (ne doit pas être utilisé en production)
        $valid_email = 'admin@adm.com';
        $valid_password = '1234';

        // Vérifier si les informations soumises correspondent aux informations valides
        if ($email === $valid_email && $password === $valid_password) {
            // Authentification réussie - vous pouvez créer une session pour l'utilisateur
            session_start();
            $_SESSION['loggedIn'] = true;
            // Rediriger l'utilisateur vers une page sécurisée par exemple
            header("Location: index.php");
            exit();
        } else {
            // Identifiants invalides
            $errorMessage = "Identifiants invalides. Veuillez réessayer.";
        }
    } else {
        // Champs manquants
        $errorMessage = "Veuillez remplir tous les champs.";
    }
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    <form action="login.php" method="post">
    <div class="form-floating mb-3">
        <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder="name@example.com" />
        <label for="inputEmail">adresse e-mail</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Password" />
        <label for="inputPassword">mot de passe</label>
    </div>
    <?php if(!empty($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    
    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
        <a class="small" href="password.html">mot de passe oublié?</a>
        <button class="btn btn-primary" type="submit">Login</button>
    </div>
</form>
</form>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Besoin d'un compte ? Inscrivez-vous !</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">innovation design 2023</div>
        
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
