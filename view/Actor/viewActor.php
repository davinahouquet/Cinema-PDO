<?php ob_start(); ?>

<p>There are <?= $requeteActor->rowCount() ?> actors</p>
<button><a href="http://localhost/Cinema-MVC/index.php?action=getAddActor">Add Actor</a></button>

<table>
    <thead>
        <tr>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requeteActor->fetchAll() as $actor){ ?>
                <tr>
                    <td><?= $actor["prenom"] ?></td>
                    <td><?= $actor["nom"] ?></td>
                    
                </tr>
          <?php  } ?>
    </tbody>
</table>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "/laragon/www/Cinema-MVC/view/template.php";