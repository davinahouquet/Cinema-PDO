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

echo "<br>";

//Afficher filmgraphie d'un réalisateur

try {
    $db1 = new PDO('mysql:host=127.0.0.1:3306;dbname=cinema;charset=utf8','root', '',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
} catch(Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$directorId = 1; // Replace with the appropriate director ID

$sqlQuery1 = 'SELECT film.titre, film.anneeSortie, personne.nom AS realisateurNom
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne
WHERE realisateur.id_personne = :directorId';

$filmStatement1 = $db1->prepare($sqlQuery1);
$filmStatement1->bindParam(':directorId', $directorId);
$filmStatement1->execute();
$films1 = $filmStatement1->fetchAll();

foreach ($films1 as $film) {
    echo $film['titre'] . ' (' . $film['anneeSortie'] . ') - Dirigé par ' . $film['realisateurNom'] . '<br>';
}

echo "<br>";

// Afficher casting d'un film 
try{
    $db2 = new PDO('mysql:host=127.0.0.1:3306;dbname=cinema;charset=utf8','root', '',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
}
catch(Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$sqlQuery2 = 'SELECT personne.prenom, personne.nom, personne.sexe
FROM film, jouer, acteur, personne
WHERE film.id_film = jouer.id_film
AND jouer.id_acteur = acteur.id_acteur
AND acteur.id_personne = personne.id_personne
AND film.id_film = 1';

$result = $db2->query($sqlQuery2);

if ($result) {
    while ($row = $result->fetch()) {
        echo "Prénom: " . $row['prenom'] . "<br>";
        echo "Nom: " . $row['nom'] . "<br>";
        echo "Sexe: " . $row['sexe'] . "<br>";
    }
}
else {
    echo "Error executing query: " . $db2->errorInfo()[2];
} 
//A chaque itération on echo prenom, nom, sexe 
?>
