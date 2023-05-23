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
         <p>Movie related : <a href="index.php?action=detailFilm&id=<?=$acteur["id_film"]?>"><?= $acteur["titre"] ?></a>. <br> Interpreted by : <a href ="index.php?action=detailsActor&id=<?= $acteur["id_acteur"] ?>" class="lienListe"><?= $acteur["prenom"] ." " . $acteur["nom"] ?></a></p>
    <?php        
         }
    ?>
</div>

<form action="index.php?action=deleteRole&id=<?=$role["id_role"]?>" method="post">
    <input type="submit" name="deleteRole" value="Delete this role">
</form>

<?php
$titre = "Role details";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php