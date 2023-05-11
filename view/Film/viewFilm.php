<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> films</p>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php