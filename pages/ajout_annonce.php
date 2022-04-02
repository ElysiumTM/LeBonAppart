<?php
require_once '../functions/requests.php';
require_once '../templates/header.php';

if(isset($_POST) && !empty($_POST)) {
  $error = ajoutAnnonce($_POST);

  if($error == "") {
    echo "<div class=\"alert alert-success\" role=\"alert\">Ajout effectué.</div>";
  }
  else {
    echo "<div class=\"alert alert-danger\" role=\"alert\">$error</div>";
  }
}


$html=<<<HTML
<div style="padding: 24px;">
  <h1>Ajouter une annonce</h1>

  <form style="width: 600px;" action="/pages/ajout_annonce.php" method="POST">
    <div class="form-group">
      <label for="title">Titre de l'annonce</label>
      <input name="title" type="text" class="form-control" id="title" placeholder="Titre">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input name="description" type="text" class="form-control" id="description" placeholder="Description">
    </div>

    <div class="form-group">
      <label for="postal_code">Code postal</label>
      <input name="postal_code" type="text" class="form-control" id="postal_code" placeholder="Code Postal">

      <label for="city">Ville</label>
      <input name="city" type="text" class="form-control" id="city" placeholder="Ville">
    </div>

    <div class="form-group">
      <label for="type">Type d'annonce</label>
      <select name="type" class="form-control" id="type">
        <option value="location">Location</option>
        <option value="vente">Vente</option>
    </select>
    </div>

    <div class="form-group">
      <label for="price">Prix</label>
      <input name="price" type="number" class="form-control" id="price" placeholder="Prix">
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </form>
</div>
HTML;

echo $html;

require_once '../templates/footer.php';
?>