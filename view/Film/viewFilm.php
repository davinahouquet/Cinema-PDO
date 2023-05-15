<?php

ob_start();

?>

<p>There are <?= $requete->rowCount() ?> movies</p>

<table>
    <thead>
        <tr>
            <th>TITLE</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $film){ ?>
                <tr>
                    <td><?= $film["titre"] ?></td>
                    
                </tr>
          <?php  } ?>
    </tbody>
</table>


<?php
$titre = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php