<?php

ob_start();

$detailFilm = $requeteFilm->fetchAll();
$genres = $requeteGenre->fetchAll();

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
            <th>Genre(s)</th>
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
                    <td><a href="index.php?action=detailsDirector&id=<?=$film["id_realisateur"]?>"><?= $film["prenom"]." ".$film["nom"] ?></a></td>
                    <td><?= $film["synopsis"] ?></td>

                    <?php 
                    foreach($genres as $genre){
                    ?>    
                        <td><?= $genre["nom_genre"]?></td>
                    <?php
                    }
                    ?>
                </tr>
          <?php  } ?>
    </tbody>
</table>


<?php
$titre = "Details";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php