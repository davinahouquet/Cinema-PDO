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
        <p><a href="index.php?action=detailFilm&id=<?= $film["id_film"]?>"><?= $film["titre"] ?></a></p>
    <?php        
         }
    ?>
</div>

<form action="index.php?action=deleteActor&id=<?=$acteur["id_acteur"]?>" method="post">
     <input type="submit" name="deleteActor" value="Delete this Actor">    
</form>

<?php
$titre = "Actor";
$contenu = ob_get_clean();
require "view/template.php";