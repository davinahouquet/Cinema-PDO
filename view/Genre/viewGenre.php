<?php ob_start(); ?>

<p>There are <?= $requeteGenre->rowCount() ?> genres</p>
<button><a href="http://localhost/Cinema-MVC/index.php?action=getAddGenre">Add Genre</a></button>

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
                    <td><a href="index.php?action=detailsGenre&id=<?=$id?>"><?= $genre["nom_genre"] ?></a></td>
                    
                </tr>
          <?php  } ?>
    </tbody>
</table>

<?php
$titre = "Genres list";
$contenu = ob_get_clean();
require "/laragon/www/Cinema-MVC/view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php


// SELECT f.titre
// FROM categoriser c, film f, genre g
// WHERE c.id_film = f.id_film
// AND c.id_genre = g.id_genre
// AND g.id_genre = :id