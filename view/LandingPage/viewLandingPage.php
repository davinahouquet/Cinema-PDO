<?php ob_start(); ?>

<h1>Movie night? Think about us</h1>
<h2>Infos about 20 movies with some clicks</h2>
<?php
$titre = "Landing Page";
$titre_secondaire = "Landing Page";
$contenu = ob_get_clean();
require "/laragon/www/Cinema-MVC/view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php