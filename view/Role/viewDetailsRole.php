<?php

ob_start();

?>

<!-- Affichage des détails d'un genre -->
<div>
    <?php
        $role = $requeteDetailsRole->fetch();
    ?>
        <h2><?= $role["role"] ?></h2>
        
    <?php
        foreach($requeteActeur->fetchAll() as $acteur){
    ?>
         <p><a href="#">Movie related : <?= $acteur["titre"] ?></a>. <br> Interpreted by : <a href ="#" class="lienListe"><?= $acteur["prenom"] ." " . $acteur["nom"] ?></a></p>
    <?php        
         }
    ?>
</div>


<?php
$titre = "Role";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php