<?php

ob_start();

?>

<!-- Affichage les détails d'un réalisateur -->
<div>
    <?php
        $realisateur = $requeteDetailsDirector->fetch();
    ?>
        <h2><?= $realisateur["prenom"] . " " . $realisateur["nom"] ?></h2>

        <h3>Details : </h3>

        <p><?= $realisateur["sexe"] ?></p>
        <br>
        <p>Date of birth : <?= $realisateur["date_naissance"] ?></p>

        <h3>Movie(s) related : </h3>
    <?php
        foreach($requeteFilms->fetchAll() as $film){
    ?>
        <p><?= $film["titre"] ?></p>
    <?php        
         }
    ?>
</div>


<?php
$titre = "Actor";
$contenu = ob_get_clean();
require "view/template.php";