<?php

ob_start();

?>

<h1>Choose between our <?= $requete->rowCount() ?> movies !</h1>




<div class="button-film-container">
    <button class="cinema-button"><a href="index.php?action=getAddFilm">Add Film</a></button>
    <button class="cinema-button"><a href="index.php?action=getAddCasting">Add Casting</a></button>
</div>

<div class="lists-container">
    <?php
        foreach($requete->fetchAll() as $film){ ?>
            <table>
                <thead>
                    <th><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?php
                        if($film["affiche"] == NULL){
                            echo "<img src='public/img/cinema.jpg' height='200'>";
                        }
                        else{
                        echo "<img src=". $film["affiche"] ." width='300'>";
                        }
                    ?></a></th>
                </thead>
                <tbody>
                    <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                </tbody>
            </table>
            
                
          <?php  } ?>
</div>

<div class="viewFilm-img-container">
    <img src="public/img/Scarface-PNG-Image.png" class="viewFilm-img">
</div>
<?php
$titre = "Movies";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php