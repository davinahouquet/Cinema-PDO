<?php

ob_start();

$detailFilm = $requeteFilm->fetchAll();
$genres = $requeteGenre->fetchAll();

?>
<div class="details-film-container">
    
    <?php foreach($detailFilm as $film){ ?>

    <h1><?= $film["titre"] ?> ( <?= $film["anneeSortie"]?> )</h1>
    <table cellspacing="3">
        <tbody>
            <tr>
                <td>
                    <?php
                        if($film["affiche"] == NULL){
                            echo "<img src='public/img/idk.jpeg' width='300'>";
                        }
                        else{
                        echo "<img src=". $film["affiche"] ." width='300'>";
                        }
                        ?>
                </td>
                <td>
                    <p>Duration : <?= $film["duree"]?></p>
                    <p>Note : <?= $film["note"]?></p>
                    <p>Director : <a href="index.php?action=detailsDirector&id=<?=$film["id_realisateur"]?>"><?= $film["prenom"]." ".$film["nom"] ?></a></p>
                    <p>Synopsis : <?= $film["synopsis"] ?></p>
                    <p>Genre(s) : 

                    <?php 
                        foreach($genres as $genre){
                    ?>
                    <a href="index.php?action=detailsGenre&id=<?= $genre["id_genre"]?>"> <?= $genre["nom_genre"]?></a></p>
                    <?php
                        }
                    ?>
                       
                </td>
            </tr>

            <?php  } ?>
        </tbody>
    </table>

    
    <div class="details-film-button">
        <a href="index.php?action=updateFilm&id=<?= $film["id_film"]?>"><input class="button" type="submit" value="Update this movie"></a>
        
        <form method="post" action="index.php?action=deleteFilm&id=<?= $film["id_film"]?>">
            <input class="button" type="submit" name="deleteFilm" value="Delete this movie">
        </form>
        
    </div>
</div>

<div class="viewFilm-img-container">
    <img src="public/img/Scarface-PNG-Image.png" class="viewFilm-img">
</div>

<?php
$titre = "Details";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php