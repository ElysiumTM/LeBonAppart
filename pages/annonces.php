<?php
require_once '../functions/requests.php';
require_once '../templates/header.php';

$annonces = recupererAnnonces(true);

$html =<<<HTML
<div style="padding: 24px;">
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">Titre</th>
        <th scope="col">Description</th>
        <th scope="col">Code postal</th>
        <th scope="col">Ville</th>
        <th scope="col">Type</th>
        <th scope="col">Prix</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
HTML;

if(count($annonces) > 0) {
  foreach($annonces as $annonce) {
    $titre = strtoupper($annonce['title']);
    $lien = "<a href=\"/pages/annonce.php?id={$annonce['id']}\">Consulter l'annonce</a>";

    $estReservee = $annonce['reservation_message'] != "";
    $badge="";
    if($estReservee) {
      $badge = "<span class=\"badge bg-danger\" style=\"margin-right:8px;\">Reservée</span>";
    }
    $annonceHtml =<<<HTML
        <tr>
          <td>{$badge}{$titre}</td>
          <td>{$annonce['description']}</td>
          <td>{$annonce['postal_code']}</td>
          <td>{$annonce['city']}</td>
          <td>{$annonce['type']}</td>
          <td>{$annonce['price']}</td>
          <td>$lien</td>
        </tr>
HTML;

    $html .= $annonceHtml;
  }
}
else {
  $html .= "<tr><td  colspan='6' style='text-align: center;'>Aucune annonce.</td></tr>";
}

$html .=<<<HTML
    </tbody>
  </table>
</div>
HTML;

echo $html;

require_once '../templates/footer.php';
?>