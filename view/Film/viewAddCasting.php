<?php

ob_start();

?>

<div class="container-form">

<form action="index.php?action=addCasting" enctype="multipart/form-data" method="POST" class="addCasting">
    
    <h1>Add a casting</h1>
    
    <div class="form-input">
        <label for="film">Movie :</label>
        <select name="film" id="film" required>

                <?php
                    $i = 1;
                    foreach($requeteFilm->fetchAll() as $film){
                ?>
                    <option value="<?= $i ?>"><?= $film["titre"]?></option>
                <?php
                        $i++;
                    }
                ?>

            </select>
    </div>
    <div class="form-input">
        <label for="role">Role :</label>
        <select name="role" id="role" required>

                <?php
                    $i = 1;
                    foreach($requeteRole->fetchAll() as $role){
                ?>
                    <option value="<?= $i ?>"><?= $role["role"] ?></option>
                <?php
                        $i++;
                    }
                ?>

            </select>

    </div>
    <div class="form-input">
        <label for="acteur">Actor :</label>      
        <select name="acteur" id="acteur" required>

                <?php
                    $i = 1;
                    foreach($requeteActor->fetchAll() as $acteur){
                ?>
                    <option value="<?= $i ?>"><?= $acteur["prenom"] . " " . $acteur["nom"] ?></option>
                <?php
                        $i++;
                    }
                ?>

            </select>
    </div>


    <input type="submit" name="submitCasting" value="submit">
</form>

<?php
$titre = "Add Casting";
$contenu = ob_get_clean();
require "view/template.php";