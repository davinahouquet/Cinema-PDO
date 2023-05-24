<?php

ob_start();
$director = $requeteDirector -> fetch();
?>
<div class="container-form">

<form enctype='multipart/form-data' action="index.php?action=updateDirector&id=<?= $director["id_realisateur"] ?>" method="POST" class="addDirector">
    
    <h1>Add a director</h1>
    
    <div class="form-input">
        <label for="prenom">First Name :</label>
        <input type="text" placeholder="First Name" name="prenom" value="<?= $director["prenom"] ?>">
    </div>
    <div class="form-input">
        <label for="nom">Last Name :</label>
        <input type="text" placeholder="Last Name" name="nom" value="<?= $director["nom"] ?>">
    </div>
    <div class="form-input">

        <label for="sexe">Gender :</label>
            M :</label><input type="radio" name="sexe" value="<?= $director["sexe"] ?>">
            F :</label><input type="radio" name="sexe" value="<?= $director["sexe"] ?>">
    </div>

    <div class="form-input">
        <label for="dateNaissance">Date of birth :</label>
        <input type="date" name="dateNaissance" value="<?= $director["dateNaissance"] ?>" required>
    </div>
    
    <div class="form-input">
        <input type="submit" class="submit" name="updateDirector">
    </div>
</form>
</div>
<?php
$titre = "Update director";
$contenu = ob_get_clean();
require "view/template.php";