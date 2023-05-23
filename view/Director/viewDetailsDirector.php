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
        <p><a href="index.php?action=detailFilm&id=<?=$film["id_film"]?>"><?= $film["titre"] ?></a></p>
    <?php        
         }
    ?>
</div>

<form action="index.php?action=deleteDirector&id=<?=$realisateur["id_realisateur"]?>" method="post">
    <input type="submit" name="deleteDirector" value="Delete this Director">
</form>

<?php
$titre = "Actor";
$contenu = ob_get_clean();
require "view/template.php";