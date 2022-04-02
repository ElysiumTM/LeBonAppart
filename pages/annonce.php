<?php
require_once '../functions/requests.php';
require_once '../templates/header.php';

if(!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: /');
  exit;
}

if(isset($_POST['reservation_message']) && !empty($_POST['reservation_message'])) {
  $error = reserver($_POST['id'], $_POST['reservation_message']);

  if($error == "") {
    echo "<div class=\"alert alert-success\" role=\"alert\">Réservation effectuée.</div>";
  }
  else {
    echo "<div class=\"alert alert-danger\" role=\"alert\">$error</div>";
  }
}

$annonce = recupererAnnonce($_GET['id']);
$estReservee = $annonce['reservation_message'] != "";

$messageReservation = "";
$badge = "";
if($estReservee) {
  $messageReservation ="<small style='text-align: center; display: block;'>Déjà reservé : {$annonce['reservation_message']}</small>";
  $badge = "<span class=\"badge bg-danger\" style=\"margin-right:8px; font-size: 12px;\">Reservée</span>";
}


$reservationForm = "";
if(!$estReservee) {
  $reservationForm=<<<HTML
    <form style="width: 600px; margin-top: 24px;" action="/pages/annonce.php?id={$annonce['id']}" method="POST">
      <h2>Réserver l'annonce :</h2>
      <div class="mb-3">
        <label for="reservation_message" class="form-label">Motif de réservation</label>
        <textarea name="reservation_message" class="form-control" id="reservation_message"></textarea>
      </div>
      <input type="hidden" name="id" value="{$annonce['id']}">
      <button type="submit" class="btn btn-primary">Je réserve</button>
    </form>
HTML;
}

$html =<<<HTML
<div style="padding: 24px;">
  <h1>Détails de l'annonce</h1>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{$badge}{$annonce['title']}</h5>
      <h6 class="card-subtitle mb-2 text-muted" style="float: right;">{$annonce['city']} {$annonce['postal_code']}</h6>
      <p class="card-text">{$annonce['description']}</p>      
      $messageReservation
    </div>
    <div class="card-footer">
      <span style="text-transform: capitalize; float: left;">{$annonce['type']}</span>
      <span style="float: right;">Prix {$annonce['price']} €</span>
    </div>
  </div>

  $reservationForm
</div>
HTML;

echo $html;

require_once '../templates/footer.php';
?>