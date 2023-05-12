<?php ob_start(); ?>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "/laragon/www/Cinema-MVC/view/template.php";