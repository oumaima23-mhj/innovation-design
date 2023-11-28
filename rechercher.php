<?php

if(isset($_GET) && $_GET['search']) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Résultats de la recherche :</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) { 
        }
        echo "</ul>";
    } else {
        echo "Aucun résultat trouvé.";
    }
}
mysqli_close($conn);
?>