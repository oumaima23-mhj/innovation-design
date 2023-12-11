<?php
// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    // Si l'utilisateur est connecté, détruisez la session et redirigez-le vers la page de connexion par exemple
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
} else {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: login.php");
    exit();
}
?>
