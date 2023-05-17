<?php

ob_start();

?>

<p>There are <?= $requete->rowCount() ?> movies</p>
<button class="film-button"><a href="index.php?action=addFilm">Add Film</a></button>
<button class="film-button"><a href="index.php?action=addCasting">Add Casting</a></button>
<table class="table-view-film">
    <thead>
        <tr>
            <th>TITLE</th>
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


<?php
$titre = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php