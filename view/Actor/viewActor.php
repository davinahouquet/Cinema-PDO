<?php ob_start(); ?>

<p class="p-actor">Click on one of our <?= $requeteActor->rowCount() ?> actors to have more informations</p>

<section class="viewActor">
    <table>
        <thead>
            <tr>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th><button class="cinema-button"><a href="index.php?action=getAddActor">Add Actor</a></button></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requeteActor->fetchAll() as $actor){ ?>
                    <tr>
                        <td><a href="index.php?action=detailsActor&id=<?=$actor["id_acteur"]?>"><?= $actor["prenom"] ?></a></td>
                        <td><a href="index.php?action=detailsActor&id=<?=$actor["id_acteur"]?>"><?= $actor["nom"] ?></a></td>
                        <td></td>
                    </tr>
            <?php  } ?>
        </tbody>
    </table>
    <div class="actor-image-container">
        <img src="public/img/patrick_bateman_png_by_monkeydgerluffy_dfkytyp-fullview.png" class="actor-image">
    </div>

</section>

<?php
$titre = "Actors";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";