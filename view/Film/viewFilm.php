<?php

ob_start();

?>

<h1>Choose between our <?= $requete->rowCount() ?> movies !</h1>

<div class="button-film-container">
    <button class="cinema-button"><a href="index.php?action=getAddFilm">Add Film</a></button>
    <button class="cinema-button"><a href="index.php?action=getAddCasting">Add Casting</a></button>
</div>

<p>Click on it to have more informations</p>

<div class="lists-container">
    <?php
        foreach($requete->fetchAll() as $film){ ?>
            <table>
                <thead>
                    <th><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?php
                        if($film["affiche"] == NULL){
                            echo "<img src='public/img/cinema.jpg' height='300' class='img-film'>";
                        }
                        else{
                        echo "<img src=". $film["affiche"] ." width='250' height='350' class='img-film'>";
                        }
                    ?></a></th>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><h3 class="h3-film"><?= $film["titre"] ?>  <i class='fa-regular fa-heart'></i></h3></a></td>
                    </tr>
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