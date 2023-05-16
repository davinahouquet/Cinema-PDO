<?php

ob_start();

?>

<!-- Affichage des détails d'un genre -->
<div>
    <?php
        $genre = $requeteDetailsGenre->fetch();
    ?>
        <h2><?= $genre["nom_genre"] ?></h2>
        <h3>Movies related : </h3>
    <?php
        foreach($requeteFilm->fetchAll() as $film){
    ?>
        <p><?= $film["titre"] ?></p>
    <?php        
         }
    ?>
</div>


<?php
$titre = "Genre";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php