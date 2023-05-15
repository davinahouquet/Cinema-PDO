<?php ob_start(); ?>

<p>There are <?= $requeteDirector->rowCount() ?> directors</p>

<table>
    <thead>
        <tr>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requeteDirector->fetchAll() as $director){ ?>
                <tr>
                    <td><?= $director["prenom"] ?></td>
                    <td><?= $director["nom"] ?></td>
                    
                </tr>
          <?php  } ?>
    </tbody>
</table>

<?php
$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php