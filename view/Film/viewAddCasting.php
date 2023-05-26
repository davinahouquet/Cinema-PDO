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
                    
                    foreach($requeteFilm->fetchAll() as $film){
                ?>
                    <option value="<?= $film["id_film"] ?>"><?= $film["titre"]?></option>
                <?php
                
                    }
                ?>

            </select>
    </div>
    <div class="form-input">
        <label for="role">Role :</label>
        <select name="role" id="role" required>

                <?php
                  
                    foreach($requeteRole->fetchAll() as $role){
                ?>
                    <option value="<?= $role["id_role"] ?>"><?= $role["role"] ?></option>
                <?php
                       
                    }
                ?>

            </select>

    </div>
    <div class="form-input">
        <label for="acteur">Actor :</label>      
        <select name="acteur" id="acteur" required>

                <?php
                    
                    foreach($requeteActor->fetchAll() as $acteur){
                ?>
                    <option value="<?= $acteur["id_acteur"] ?>"><?= $acteur["prenom"] . " " . $acteur["nom"] ?></option>
                <?php
                       
                    }
                ?>

            </select>
    </div>
    <div class="button-container">
        <input type="submit" name="submitCasting" value="Submit" class="button-casting">
    </div>
</form>

<?php
$titre = "Add Casting";
$contenu = ob_get_clean();
require "view/template.php";