<?php

function recupererAnnonce($id) {
  $pdo = new PDO('mysql:host=localhost;dbname=appart', "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
  $req="SELECT * FROM advert WHERE id = :id;"; 
  $request = $pdo->prepare($req);
  $request->bindParam(':id', $id);
  $request->execute();
  return $request->fetch();
}

function recupererAnnonces($all = false) {
  $limit = "";
  if($all == false) {
    $limit = "LIMIT 15";
  }

  $pdo = new PDO('mysql:host=localhost;dbname=appart', "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
  $req="SELECT * FROM advert ORDER BY id DESC $limit;"; 
  $request = $pdo->prepare($req);
  $request->execute();
  return $request->fetchAll();
}

function ajoutAnnonce($data) {
  $error = "";

  if(!isset($data['title']) || empty($data['title'])) {
    $error .= "Le champ titre est obligatoire.<br>";
  } 
  
  if (!isset($data['description']) || empty($data['description'])) {
    $error .= "Le champ description est obligatoire.<br>";
  }
  
  if (!isset($data['postal_code']) || empty($data['postal_code'])) {
    $error .= "Le champ code postal est obligatoire.<br>";
  }

  if (strlen($data['postal_code']) < 5) {
    $error .= "Le champ code postal est incorrect.<br>";
  }
  
  if (!isset($data['city']) || empty($data['city'])) {
    $error .= "Le champ ville est obligatoire.<br>";
  }
  
  if (!isset($data['type']) || empty($data['type'])) {
    $error .= "Le champ type est obligatoire.<br>";
  }
  
  if(!isset($data['price']) || empty($data['price'])){
    $error .= "Le champ prix est obligatoire.<br>";
  }

  if(!is_numeric($data['price'])) {
    $error .= "Le champ prix est incorrect.<br>";
  }

  if($error != "") {
    return $error;
  }

  $pdo = new PDO('mysql:host=localhost;dbname=appart', "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
  $req="INSERT INTO `advert`(`title`, `description`, `postal_code`, `city`, `type`, `price`) VALUES (:title, :description, :postal_code, :city, :type, :price);";  

  $request = $pdo->prepare($req);
  $request->bindParam(':title', $data['title']);
  $request->bindParam(':description', $data['description']);  
  $request->bindParam(':postal_code', $data['postal_code']);  
  $request->bindParam(':city', $data['city']);  
  $request->bindParam(':type', $data['type']);  
  $request->bindParam(':price', $data['price']);  
  $request->execute();

  if($request == false) {
    return "Une erreur est survenue.";
  }
  return "";
}

function reserver($id, $message) {
  $pdo = new PDO('mysql:host=localhost;dbname=appart', "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
  $req="UPDATE advert SET reservation_message = :message WHERE id = :id;";
  $request = $pdo->prepare($req);
  $request->bindParam(':id', $id);
  $request->bindParam(':message', $message);  
  $request->execute();

  if($request == false) {
    return "Une erreur est survenue.";
  }
  return "";
}

?>