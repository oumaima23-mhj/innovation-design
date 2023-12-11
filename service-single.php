<?php
    session_start();
    
    if(isset($_GET) && $_GET && $_GET['service_id']){
        include_once ("db_connect.php");

        $service_id = $_GET['service_id'];

        $sql = "SELECT * FROM `services` WHERE `service_id` = " . $service_id . ";";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $service = $result->fetch_assoc();
        }else{
            header("Location: index.php");
            die;
        }

        // Récupération des commentaires avec leurs réponses
        $sql = "SELECT * FROM `commentaire` where reponse is null and id_service=".$service_id."	;";
        $result = $conn->query($sql);
        $comments = array();
        while ($row = $result->fetch_assoc()) {
            $commentId = $row['id'];
            $comment = $row;
            $comment['reponse'] = array();
            
            // Ajout des réponses associées au commentaire
            $sqlReply = "SELECT * FROM `commentaire` where reponse = " . $commentId ." and id_service=".$service_id.";";
            $resultReply = $conn->query($sqlReply);
            
            $replys = array();
            while ($reply = $resultReply->fetch_assoc()) {
                $replyId = $reply['id'];
                $replys[$replyId] = $reply;
            }
            $comment['reponse'] = $replys;
            $comments[$commentId] = $comment;

        }
    }else{
        header("Location: index.php");
        die;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['rating'])){
            $rating = $_POST['rating'];
            $user_id = $_SESSION["id"];
            $service_id = $_GET['service_id'];

            include_once ("db_connect.php");
            $sql = "INSERT INTO `rating`(`user_id`, `service_id`, `value`) VALUES ('". $user_id ."','". $service_id ."','". $rating ."')";
            $result = $conn->query($sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ino design</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="google.css" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .rating-card {
            max-width: 33rem;
            background: #fff;
            margin: 0 1rem;
            padding: 1rem;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            width: 100%;
            border-radius: 0.5rem;
        }

        .rating-star {
            font-size: 10vh;
        }

        .one {
            color: rgb(255, 0, 0);
        }

        .two {
            color: rgb(255, 106, 0);
        }

        .three {
            color: rgb(251, 255, 120);
        }

        .four {
            color: rgb(255, 255, 0);
        }

        .five {
            color: rgb(24, 159, 14);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
   <?php
   include "nav.php" ;
   ?>
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4"><?= $service['title'] ?></h1>
            </div>
        </div>
    </div>

    <div class="container-fluid p-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="mb-5">
                    <img class="img-fluid w-100 rounded mb-5" src="<?= $service['image'] ?>" alt="">
                    <p><?= $service['description'] ?></p>    
                </div>
            </div>
        </div>
    </div>
<?php 
include "./rating.php";
rating($service_id);
?>
    <div class="container-fluid p-5">
        <div class="row g-5">
            <div class="col-lg-8">        
                <div class="mb-5">
                    <div class="mb-5">
                        <?php foreach ($comments as $comment) { ?>
                        <div class="d-flex mb-4">
                            <!-- ... -->
                            <div id="<?= $comment["id"] ?>" class="ps-3">
                                <h6><a href=""><?= $comment["nom"] ?></a> <small><i><?= $comment["date"] ?></i></small></h6>
                                <p><?= $comment["comment"] ?></p>
                                <button class="btn btn-sm btn-secondary"
                                    onclick="replyToComment(<?= $comment['id'] ?>)">Répondre</button>
                                <form id="replyForm<?= $comment["id"] ?>" method="POST" action="addrep.php"
                                    class="replyForm my-3" style="display: none;">
                                    <input type="text" name="service_id" hidden value="<?php echo ($service_id); ?>">
                                    <input type="text" name="com_id" hidden value="<?php echo ($comment["id"]); ?>">
                                    <input type="text" name="nom" hidden value="<?php echo ( $comment["nom"]); ?>">
                                    <textarea name="comment" class="form-control bg-light border-0 px-4 py-3" cols="100"
                                        rows="2" placeholder="Message"></textarea>
                                    <button class="btn btn-primary my-3" type="submit">publié</button>
                                </form>

                                <?php foreach ($comment['reponse'] as $reply) { ?>
                                <div class="d-flex my-4">
                                    <!-- ... -->
                                    <div class="ps-3">
                                        <h6>
                                            <a href=""><?= $reply["nom"] ?></a>
                                            <small><i><?= $reply["date"] ?></i></small>
                                        </h6>
                                        <p><?= $reply["comment"] ?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    <div class="d-flex ms-5 mb-4">
                        <div class="ps-3">
                            <?php if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) { ?>
                            <h3> Connectez-vous pour pouvoir commenter". ?</h3>
                            <a href="login.php" class="btn btn-primary">login</a>
                            <?php } else { ?>
                            <form method="POST">
                                <div class="rating-card">
                                    <br />
                                    <span onclick="gfg(1)" class="rating-star">★</span>
                                    <span onclick="gfg(2)" class="rating-star">★</span>
                                    <span onclick="gfg(3)" class="rating-star">★</span>
                                    <span onclick="gfg(4)" class="rating-star">★</span>
                                    <span onclick="gfg(5)" class="rating-star">★</span>
                                    <h3 id="output">Rating : 0/5</h3>
                                    <!-- Ajout du champ pour l'évaluation (rating) -->
                                    <input type="hidden" name="rating" id="rating" value="0">
                                </div>
                                <input class="btn btn-primary py-3" type="submit" value="Submit Rating">
                            </form>
                            <form method="POST" action="addcom.php">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div>
                                        <input type="text" name="service_id" hidden value="<?php echo ($service_id); ?>">

                                            <textarea name="comment" class="form-control bg-light border-0 px-4 py-3"
                                                cols="100" rows="4" placeholder="Message"></textarea>
                                            <button class="btn btn-primary py-3" type="submit">Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   <?php include "footer.php";?>
    <script>
        let stars = document.getElementsByClassName("rating-star");
        let output = document.getElementById("output");

        function gfg(n) {
            remove();
            for (let i = 0; i < n; i++) {
                let cls = "";
                if (n == 1) cls = "one";
                else if (n == 2) cls = "two";
                else if (n == 3) cls = "three";
                else if (n == 4) cls = "four";
                else if (n == 5) cls = "five";
                stars[i].className = "rating-star " + cls;
            }
            output.innerText = "Rating is: " + n + "/5";
            // Mettre à jour la valeur du champ rating dans le formulaire
            document.getElementById("rating").value = n;
        }

        function remove() {
            for (let i = 0; i < stars.length; i++) {
                stars[i].className = "rating-star";
            }
        }

        let replyCount = 0;

        function replyToComment(commentId) {
            const replyForms = document.getElementsByClassName('replyForm');

            for (let i = 0; i < replyForms.length; i++) {
                replyForms[i].style.display = "none";
            }

            const replyForm = document.getElementById(`replyForm${commentId}`);
            replyForm.style.display = "block";
        }

        function postReply(commentId) {
            const replyInput = document.getElementById(`replyInput${commentId}`).value;
            const repliesSection = document.getElementById(`replies${commentId}`);

            const newReply = document.createElement('div');
            newReply.classList.add('reply');
            newReply.innerHTML = `<p>${replyInput}</p>`;

            repliesSection.appendChild(newReply);

            // Réinitialiser le formulaire de réponse
            const replyForm = document.getElementById(`replyForm${commentId}`);
            replyForm.style.display = "none";
            document.getElementById(`replyInput${commentId}`).value = "";
        }
    </script>
</body>

</html>