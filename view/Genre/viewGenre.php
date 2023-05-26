<?php ob_start(); ?>

<p>There are <?= $requeteGenre->rowCount() ?> genres</p>
<button class="cinema-button"><a href="index.php?action=getAddGenre">Add Genre</a></button>
<div class="director-list-container">
<table>
    <thead>
        <tr>
            <th>GENRES</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requeteGenre->fetchAll() as $genre){ ?>
                <tr>
                    <td><a href="index.php?action=detailsGenre&id=<?=$genre["id_genre"]?>"><?= $genre["nom_genre"] ?></a></td>
                    
                </tr>
          <?php  } ?>
    </tbody>
</table>
</div>
<?php
$titre = "Genres";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php


// SELECT f.titre
// FROM categoriser c, film f, genre g
// WHERE c.id_film = f.id_film
// AND c.id_genre = g.id_genre
// AND g.id_genre = :id