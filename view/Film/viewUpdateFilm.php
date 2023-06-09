<?php

ob_start();

$film = $requete->fetch();
// var_dump($film);die;
?>

<div class="container-form">

<form enctype="multipart/form-data" action="index.php?action=updateFilm&id=<?=$film["id_film"]?>" method="POST" class="updateFilm">
    
    <h1>Update this movie</h1>
    
    <div class="form-input">
        <label for="titre">Title :</label>
        <input name="titre" id="titre" type="text" placeholder="New title" required value='<?= $film["titre"] ?>'>
    </div>
    <div class="form-input">
        <label for="realisateur">Director :</label>
            <select class="select" name="realisateur">

                <?php
                   
                    foreach($requeteDirector->fetchAll() as $realisateur){
                ?>
                    <option value="<?= $realisateur["id_realisateur"]?>"><?= $realisateur["prenom"] . " " . $realisateur["nom"] ?></option>
                <?php
                    }
                ?>
            </select>
    </div>

    <div class="form-input">
        <label>Genre :</label>
        
        <select name="genre[]" class="select-genre" multiple required>

            <?php

                foreach($requeteGenre->fetchAll() as $genre){
            ?>
                <option value="<?= $genre["id_genre"]?>"><?= $genre["nom_genre"]?></option>
            <?php
                }

            ?>
        </select>
    </div>
    <p class="select-p">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>


    <div class="form-input">
        <label>Release date :</label>
        <input name="anneeSortie" id="dateSortie" type="number" min="1" max="3000" required value='<?= $film["anneeSortie"] ?>'>
    </div>
    <div class="form-input">
        <label>Duration (min) :</label>
        <input name="duree" type="number" min="1" value="<?= $film["duree"] ?>" required>
    </div>
    <div class="form-input">
        <label>Plot :</label>
        <textarea name="synopsis" id="synopsis" type="text" value='<?= $film["synopsis"] ?>'  required></textarea>
    </div>
    <div class="form-input">
        <label>Image :</label>
        <input name="affiche" type="file" value='<?= $film["affiche"] ?>'>
    </div>
    <div class="form-input">
        <label for="note">Note :</label>
        <input type="number" step="0.01" id="totalAmt" name="note" min="1" max="5"  value='<?= $film["note"] ?>'required>
       
        
    </div>
    <div class="button-input">
        <input name="updateFilm" value="Update" type="submit" class="submit"  required>
    </div>
</form>
</div>

<?php
$titre = "Update Film";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php