<?php

ob_start();
$actor = $requeteActor->fetch();
?>
<div class="container-form">

<form enctype='multipart/form-data' action="index.php?action=updateActor&id=<?= $actor["id_acteur"]?>" method="post" class="updateFilm">
    
    <h1>Update actor</h1>
    
    <div class="form-input">
        <label for="prenom">First Name :</label>
        <input type="text" placeholder="First Name" name="prenom" value="<?= $actor["prenom"]?>">
    </div>
    <div class="form-input">
        <label for="nom">Last Name :</label>
        <input type="text" placeholder="Last Name" name="nom" value="<?= $actor["nom"]?>">
    </div>

    <div class="form-input">

        <label for="sexe">Gender :</label>
            M :</label><input type="radio" name="sexe" value="Homme" value="<?= $actor["sexe"]?>">
            F :</label><input type="radio" name="sexe" value="Femme" value="<?= $actor["sexe"]?>">
    </div>

    <div class="form-input">
        <label for="dateNaissance">Date of birth :</label>
        <input type="date" name="dateNaissance" id="dateNaissance" required value="<?= $actor["dateNaissance"]?>">
    </div>
    <div class="form-input">
        <input type="submit" class="submit" name="updateActor">

    </div>
</form>
</div>
<?php
$titre = "Update actor";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php