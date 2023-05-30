<?php ob_start(); ?>


<p>Choose your movie by our <?= $requeteGenre->rowCount() ?> genres</p>

<div class="button-film-container">
    <button class="cinema-button"><a href="index.php?action=getAddGenre">Add Genre</a></button>
</div>
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
