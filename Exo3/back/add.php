<?php

try {
  $instance = new PDO("mysql:host=localhost;dbname=exo3", "root", "", array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
} catch (Exception $e) {
  die($e->getMessage());
}



// on récupere les données envoyé par le font en ajax
$credentials = array(
"marque" => $_POST['marque'],
"modele" => $_POST['modele'],
"annee" => $_POST['annee'],
"couleur" => $_POST['couleur'],
);

$modeleQuery = $instance->prepare("SELECT * FROM vehicule WHERE vehicule.modele = :modele ");
$modeleQuery->execute(array("modele" => $credentials['modele']));
$modele = $modeleQuery->fetch();


if ($modele == false){
  $insertModeleQuery = $instance->prepare('INSERT INTO vehicule (marque, modele, annee, couleur)
  VALUES (:marque, :modele, :annee, :couleur)');
  $newUser = $insertModeleQuery->execute(array(
    'marque' => $credentials['marque'],
    'modele' => $credentials['modele'],
    'annee' => $credentials['annee'],
    'couleur' => $credentials['couleur'],
  ));
  header('Content-Type: application/json');
  echo json_encode(array("success" => 1));
}else{
  header('Content-Type: application/json');
  echo json_encode(array("echec" => 0));
}
 ?>
