<?php

ob_start();

?>

<table>
    <thead>
        <tr>
            <th>TITLE</th>
            <th>RELEASE DATE</th>
            <th>Duration</th>
            <th>Synopsis</th>
            <th>Note</th>
            <th>Director</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete1->fetchAll() as $film){ ?>
                <tr>
                    <td><?= $film["titre"] ?></td>
                    <td><?= $film["anneeSortie"]?></td>
                    <td><?= $film["duree"]?></td>
                    <td><?= $film["note"]?></td>
                    <td><?= $film['id_realisateur'] ?></td>
                </tr>
          <?php  } ?>
    </tbody>
</table>


<?php
$titre = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php