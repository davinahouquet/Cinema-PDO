<?php ob_start(); ?>

<section class="landing-page">
    <div class="titles-container">
    <div class="landing-page-title">
        <h1>Movie night? Think about us</h1>
        <h2 class="h2">Infos about 20 movies with some clicks</h2>
    </div>
    </div>
    <div class="landing-page-image-container">
        <img src="public/img/uma-thurman.png" class="landing-page-image">
    </div>
</section>
<?php
$titre = "Mooviz";
$titre_secondaire = "Landing Page";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php