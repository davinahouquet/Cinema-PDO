<?php ob_start(); ?>

<p>Click on one of our <?= $requeteDirector->rowCount() ?> directors to have more informations</p>

<div class="director-list-container">
    <table>
        <thead>
            <tr>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th><button class="cinema-button"><a href="index.php?action=getAddDirector">Add Director</a></button></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requeteDirector->fetchAll() as $director){ ?>
                    <tr>
                        <td><a href="index.php?action=detailsDirector&id=<?=$director["id_realisateur"]?>"><?= $director["prenom"] ?></a></td>
                        <td><a href="index.php?action=detailsDirector&id=<?=$director["id_realisateur"]?>"><?= $director["nom"] ?></a></td>
                        
                    </tr>
            <?php  
                }
            ?>
                </tbody>
    </table>
</div>
<?php
$titre = "Directors";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php