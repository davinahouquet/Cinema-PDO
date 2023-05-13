<?php

ob_start();

$detailFilm = $requeteFilm->fetch();
?>

<table>
    <thead>
        <tr>
            <th>TITLE</th>
            <th>RELEASE DATE</th>
            <th>Duration</th>
            <th>Note</th>
            <th>Director</th>
            <th>Synopsis</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($detailFilm as $film){ ?>
                <tr>
                    <a href="index.php?action=detailsFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a>
                    <td><?= $film["anneeSortie"]?></td>
                    <td><?= $film["duree"]?></td>
                    <td><?= $film["note"]?></td>
                    <td><?= $film['id_realisateur'] ?></td>
                    <td><?= $film['synopsis'] ?></td>
                </tr>
          <?php  } ?>
    </tbody>
</table>


<?php
$titre = $film["titre"];
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php