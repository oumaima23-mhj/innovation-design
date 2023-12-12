<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  margin: 0 auto; /* Center website */
  padding: 20px;
}

.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #04AA6D;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>
</head>
<body>

<?php

function rating($service_id){
include "db_connect.php";

// ID du service pour lequel vous voulez récupérer les évaluations (remplacez cela par votre logique)


// Requête pour récupérer les évaluations pour un service spécifique
$query = "SELECT value, COUNT(*) as count FROM rating WHERE service_id = $service_id GROUP BY value ORDER BY value DESC";
$result = mysqli_query($conn, $query);

// Initialize an array to store rating values and their counts
$ratings = array_fill(1, 5, 0); // Assuming ratings range from 1 to 5

while ($row = mysqli_fetch_assoc($result)) {
    $ratings[$row['value']] = $row['count'];
}

// Calculate average rating
$total_ratings = array_sum($ratings);
$average_rating = 0;
if ($total_ratings > 0) {
    $weighted_sum = 0;
    foreach ($ratings as $value => $count) {
        $weighted_sum += $value * $count;
    }
    $average_rating = $weighted_sum / $total_ratings;
}

?>

<span class="heading">Évaluation </span>
<?php
// Output star icons based on average rating
for ($i = 1; $i <= 5; $i++) {
    if ($i <= round($average_rating)) {
        echo '<span class="fa fa-star checked"></span>';
    } else {
        echo '<span class="fa fa-star"></span>';
    }
}
?>
<p><?php echo number_format($average_rating, 1); ?> Moyenne basée sur <?php echo $total_ratings; ?> avis</p>
<hr style="border:3px solid #f1f1f1">

<div class="row">
    <?php
    // Output rating bars and counts
    for ($i = 5; $i >= 1; $i--) {
        $count = $ratings[$i];
        $percentage = ($total_ratings > 0) ? ($count / $total_ratings) * 100 : 0;
    ?>

       
        <div class="middle">
        <div class="side">
            <div> <?php echo $i; ?>star</div>
        </div>
            <div class="bar-container">
                <div class="bar-<?php echo $i; ?>" style="width: <?php echo $percentage; ?>%;"></div>
            </div>
        </div>
        <div class="side right">
            <div><?php echo $count; ?></div>
        </div>
    <?php } ?>
</div>
<?php } ?>
</body>
</html>