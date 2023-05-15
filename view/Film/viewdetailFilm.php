<?php

ob_start();

$detailFilm = $requeteFilm->fetchAll();
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
                    <td><?= $film["titre"] ?></td>
                    <td><?= $film["anneeSortie"]?></td>
                    <td><?= $film["duree"]?></td>
                    <td><?= $film["note"]?></td>
                    <td><?= $film["prenom"]." ".$film["nom"] ?></td>
                    <td><?= $film["synopsis"] ?></td>
                </tr>
          <?php  } ?>
    </tbody>
</table>


<?php
$titre = "détails films";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php