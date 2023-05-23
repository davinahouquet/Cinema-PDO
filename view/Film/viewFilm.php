<?php

ob_start();

?>

<p>There are <?= $requete->rowCount() ?> movies</p>

<div class="lists-container">
<div class="button-film-container">
    <button class="cinema-button"><a href="index.php?action=getAddFilm">Add Film</a></button>
    <button class="cinema-button"><a href="index.php?action=getAddCasting">Add Casting</a></button>
</div>

<table class="table-view-film">
    <thead>
        <tr>
            <th>TITLES</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $film){ ?>
                <tr>
                    <td>
                        <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a>
                    </td>
                    
                </tr>
          <?php  } ?>
    </tbody>
</table>
</div>

<?php
$titre = "Movies";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php