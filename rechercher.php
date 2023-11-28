<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innovation_design";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM categories WHERE 
            affiches LIKE '%$search%' OR 
            flyers LIKE '%$search%' OR 
            carte LIKE '%$search%' OR 
            logo LIKE '%$search%' OR 
            pub LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Résultats de la recherche :</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) { 
           echo "<li>";
           echo "<a href='cv.php?id=" . $row['carte'] . "'>CV</a>";
           echo ", <a href='affiches.php?id=" . $row['affiches'] . "'>Affiches</a>";
           echo ", <a href='logo.php?id=" . $row['logo'] . "'>Logo</a>";
           echo ", <a href='pub.php?id=" . $row['pub'] . "'>Pub</a>";
           echo ", <a href='flayers.php?id=" . $row['flyers'] . "'>Flyers</a>";
           echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "Aucun résultat trouvé.";
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de recherche</title>
</head>
<body>
    <div class="mb-5">
        <div class="input-group">
            <form action="recherche.php" method="post">
                <input id="searchInput" type="text" name="search" placeholder="Recherche..." class="form-control p-3">
                <button id="searchButton" class="btn btn-primary px-4" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
</body>
</html>
