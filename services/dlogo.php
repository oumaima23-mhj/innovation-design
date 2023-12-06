
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

    <form action="creation/dlogo.php" method="post" enctype="multipart/form-data">

<div class="row g-3">

  <div class="col-6">
    <label for="nom_entreprise">Nom de l'entreprise</label>
    <input type="text" name="nom_entreprise" id="nom_entreprise" class="form-control bg-light border-0 px-4" placeholder="Entrez le nom de votre entreprise" style="height: 55px;">
  </div>

  <div class="col-6">
    <label for="couleurs">Sélectionnez vos couleurs préférées</label>
    <select multiple size="5" name="couleurs[]" id="couleurs" class="form-control bg-light border-0 px-4">
      <option value="selectionee" disabled>Sélectionnez une couleur</option>
      <option value="Red">Rouge</option>
      <option value="Blue">Bleu</option>
      <option value="Green">Vert</option>
      <option value="Yellow">Jaune</option>
      <option value="Purple">Violet</option>
      <option value="Orange">Orange</option>
      <option value="Pink">Rose</option>
      <option value="Black">Noir</option>
      <option value="White">Blanc</option>
      <option value="Brown">Marron</option>
      <option value="Gray">Gris</option>
      <option value="Gold">Or</option>
      <option value="Silver">Argent</option>
      <option value="Cyan">Cyan</option>
    </select>
  </div>

  <div class="col-12">
    <label for="description_entreprise">Description de l'entreprise</label>
    <textarea name="description_entreprise" id="description_entreprise" class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Décrivez brièvement votre entreprise"></textarea>
  </div>

  <div class="col-12">
    <label for="exemple_1">Exemple 1</label>
    <input type="file" name="exemple_1" id="exemple_1" class="form-control bg-light border-0 px-4" placeholder="Téléverser l'exemple 1" style="height: 55px;">
  </div>

  <div class="col-12">
    <label for="exemple_2">Exemple 2</label>
    <input type="file" name="exemple_2" id="exemple_2" class="form-control bg-light border-0 px-4" placeholder="Téléverser l'exemple 2" style="height: 55px;">
  </div>

  <div class="col-12">
    <label for="notes_supplementaires">Notes supplémentaires</label>
    <textarea name="notes_supplementaires" id="notes_supplementaires" class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Ajoutez des notes supplémentaires si nécessaire"></textarea>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary w-100 py-3">Envoyer la demande</button>
  </div>

</div>

</form>

<?php
include "../footer.php" ;
?>
</body>
   
</html>
