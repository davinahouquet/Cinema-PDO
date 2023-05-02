<!-- Afficher liste des films -->
<!-- Afficher filmographie d'un réalisateur -->
<!-- Afficher casting d'un film -->

<?php

try{
    $db = new PDO('mysql:host=127.0.0.1:3306;dbname=cinema;charset=utf8','root', '',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
}
catch(Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>