<?php
// Start the session
session_start();
if(!empty($_SESSION["id"])) { 
    header("location: /innovation-design/index.php");
}
$error = False;
if ($_POST){
 include "db_connect.php" ;
    $sql = "SELECT * FROM `user` where `e_mail`='" . $_POST['e_mail'] . "' and `password`='" . $_POST['password'] . "';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set session variables
        $_SESSION["id"] = true;
        $_SESSION["user"]=$row["prenom"].$row["nom"];
        header("location: /innovation-design/index.php");
        die();
    } else {
        $error = True;
    }
    $conn->close();
}

?>

<style>
    /* Style du conteneur principal */
.formulaire {
  width: 300px;
  margin: 0 auto;
  background-color: #3498db;
  padding: 20px;
  border-radius: 5px;
}

/* Style pour les éléments de saisie */
.group-form {
  margin-bottom: 15px;
  position: relative;
}

input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #ecf0f1;
}

/* Style pour les icônes */
.icon-mail,
.icon-password {
  position: absolute;
  top: 13px;
  left: 10px;
  color: #3498db;
}

/* Style pour le bouton de soumission */
.inscription {
  background-color: #fff;
  color: dark;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}



/* Changer la couleur du texte des placeholders */
input[type="email"]::placeholder,
input[type="password"]::placeholder {
  color: #7f8c8d;
}

/* Style pour les sauts de ligne <br> */
form br {
  display: none;
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ino design Template</title>
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
<br>
      <form action="login.php" method="POST" class="formulaire">
        <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert">
              login incorrect
            </div>
        <?php } ?>
        <div class="group-form">
          <input type="email" name="e_mail" placeholder="e-mail">
          <div class="icon-mail"></div>
        </div><br>
        <div class="group-form">
          <input type="password"  name="password" placeholder="password">
          <div class="icon-password"></div>
        </div><br>
        <div class="group-form">
          <input type="submit" class="inscription" value="login">
          <a href="compte.php"><input type="button" class="inscription" value="inscription"></a>
        </div>
      </form>

     </div>
  </div>
</div>    
<?php
include "footer.php" ;
?>
</body>

</html>