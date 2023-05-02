<!-- Afficher filmographie d'un réalisateur -->
<!-- Afficher casting d'un film -->

<?php

try{
    $db = new PDO('mysql:host=127.0.0.1:3306;dbname=cinema;charset=utf8','root', '',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
}
catch(Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//Afficher liste des films

$sqlQuery = 'SELECT * FROM film';
$filmStatement = $db->prepare($sqlQuery);
$filmStatement->execute();
$films = $filmStatement->fetchAll();

foreach ($films as $film){
    echo "<p>".$film['titre']." ".$film['anneeSortie']."</p>";
}
?>