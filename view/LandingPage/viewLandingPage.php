<?php ob_start(); ?>
<div class="landing-page-title">
    <h1>Movie night? Think about us</h1>
    <h2>Infos about 20 movies with some clicks</h2>
</div>

<?php
$titre = "Landing Page";
$titre_secondaire = "Landing Page";
$contenu = ob_get_clean();
require "/laragon/www/Cinema-MVC/view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php