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
            <th>Image</th>
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
                        <td><a href="index.php?action=detailsGenre&id=<?= $genre["id_genre"]?>"><?= $genre["nom_genre"]?></a></td>
                    <?php
                    }
                    ?>
                    <td>
                        <div class="affiche">
                            <?php
                                if($film["affiche"] == NULL){
                                    echo "Pas d'affiche";
                                }
                                else{
                                    echo "<img src=". $film["affiche"] .">";
                                }
                            ?>
                        </div>
                    </td>
                </tr>
          <?php  } ?>
    </tbody>
</table>

<form method="post" action="index.php?action=updateFilm&id=<?= $film["id_film"]?>" class="button">
    <input type="submit" name="updateFilm" value="Update this movie">
</form>

<form method="post" action="index.php?action=deleteFilm&id=<?= $film["id_film"]?>" class="button">
    <input type="submit" name="deleteFilm" value="Delete this movie">
</form>

<?php
$titre = "Details";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php