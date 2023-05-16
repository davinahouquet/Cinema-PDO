<?php

ob_start();

?>

<!-- Affichage les détails d'un acteur -->
<div>
    <?php
        $acteur = $requeteDetailsActor->fetch();
    ?>
        <h2><?= $acteur["prenom"] . " " . $acteur["nom"] ?></h2>

        <h3>Details : </h3>

        <p><?= $acteur["sexe"] ?></p>
        <br>
        <p>Date of birth : <?= $acteur["date_naissance"] ?></p>

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