<?php
session_start();
if ($_POST) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "innovation_design";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }
    $sql = "SELECT * FROM `user` where `nom`='" . $_POST['nom'] . "' and `prenom`='" . $_POST['prenom'] . "';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="d-flex mb-4">
                <img src="<?php echo $row['image']; ?>" class="img-fluid rounded" style="width: 45px; height: 45px;">
                <div class="ps-3">
                    <h6><a href=""><?php echo $row['auteur']; ?></a> <small><i><?php echo $row['date_commentaire']; ?></i></small></h6>
                    <p><?php echo $row['contenu']; ?></p>
                    <button class="btn btn-sm btn-secondary">repondre</button>
                </div>
            </div>
    
<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $commentId = $_POST['comment_id'];
                $replyContent = $_POST['reply_content'];

                header("Location: " . $_SERVER["HTTP_REFERER"]);
                exit();
            }
        }
    } else {
        echo "Aucun commentaire trouvé.";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "innovation_design";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }
    $sql = "SELECT * FROM `user` where `nom`=? and `prenom`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['nom'], $_POST['prenom']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="d-flex mb-4">
                <img src="<?php echo $row['image']; ?>" class="img-fluid rounded" style="width: 45px; height: 45px;">
                <div class="ps-3">
                    <h6><a href=""><?php echo $row['auteur']; ?></a> <small><i><?php echo $row['date_commentaire']; ?></i></small></h6>
                    <p><?php echo $row['contenu']; ?></p>
                    <button class="btn btn-sm btn-secondary">repondre</button>
                </div>
            </div>
            <form method="post" action="traitement_reponse.php">
                <input type="hidden" name="comment_id" value="<?php echo $row['id_commentaire']; ?>">
                <textarea name="reply_content" placeholder="Votre réponse"></textarea>
                <button type="submit" class="btn btn-sm btn-secondary">Répondre</button>
            </form>
<?php
        }
    } else {
        echo "Aucun commentaire trouvé.";
    }

    $stmt->close();
    $conn->close();
}
?>