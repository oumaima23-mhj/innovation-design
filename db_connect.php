<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "innovation_design";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }