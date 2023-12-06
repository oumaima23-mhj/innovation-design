
<!DOCTYPE html>
<?php
session_start();
?>

<head>
    
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

<body>

<?php
include "nav.php" ;
?>


    <h1>Demande de Carte de Visite</h1>
  <form action="creation/dcv.php" method="post" enctype="multipart/form-data">
    <div class="row g-3">
      <div class="col-6">
        <input type="text" class="form-control bg-light border-0 px-4" name="nom_entreprise" placeholder="Nom de l'entreprise" style="height: 55px;">
      </div>
      <div class="col-6">
        <input type="text" class="form-control bg-light border-0 px-4" name="nom_personne_contact" placeholder="Nom du contact" style="height: 55px;">
      </div>
      <div class="col-12">
        <input type="email" class="form-control bg-light border-0 px-4" name="email" placeholder="Email de contact" style="height: 55px;">
      </div>
      <div class="col-12">
        <input type="tel" class="form-control bg-light border-0 px-4" name="telephone" placeholder="Téléphone de contact" style="height: 55px;">
      </div>
      <div class="col-12">
        <textarea class="form-control bg-light border-0 px-4 py-3" name="adresse" rows="4" placeholder="Adresse de l'entreprise"></textarea>
      </div>
      <div class="col-12">
        Exemple 1 <input type="file" name="exemple_1" class="form-control bg-light border-0 px-4" style="height: 55px;">
      </div>
      <div class="col-12">
        Exemple 2 <input type="file" name="exemple_2" class="form-control bg-light border-0 px-4" style="height: 55px;">
      </div>
      <div class="col-12">
        <textarea class="form-control bg-light border-0 px-4 py-3" name="notes_supplementaires" rows="4" placeholder="Notes supplémentaires"></textarea>
      </div>
      <div class="col-12">
        <button class="btn btn-primary w-100 py-3" type="submit">Envoyer demande</button>
      </div>
    </div>
  </form>

</div>
</div>
</div>
  <?php
include "../footer.php" ;
?>
</body>
   
</html>
