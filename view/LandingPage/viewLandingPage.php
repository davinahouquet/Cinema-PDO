<?php ob_start(); ?>

<?php
$titre = "Landing Page";
$titre_secondaire = "Landing Page";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php