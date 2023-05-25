<?php

ob_start();

?>

<div class="container-image-viewAddFilm">
    <img src="public/img/Samuel-L-Jackson-PNG-Photo.png" class="image-viewAddFilm">
</div>


<div class="container-form">

<form enctype="multipart/form-data" action="index.php?action=addFilm" method="POST" class="addFilm">
    
    <h1>Add a movie</h1>
    
    <div class="form-input">
        <label for="title">Title :</label>
        <input name="titre" id="titre" type="text" placeholder="Title" required>
    </div>
    <div class="form-input">
        <label for="director">Director :</label>
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
        
        <select name="genre[]" type="text" placeholder="Genre" class="select" multiple>

            <?php

                foreach($requeteGenre->fetchAll() as $genre){
            ?>
                <option value="<?= $genre["id_genre"]?>"><?= $genre["nom_genre"]?></option>
            <?php
                    }

            ?>
        </select>
    </div>
    <div class="form-input">
        <label>Release date :</label>
        <input name="anneeSortie" id="dateSortie" type="number" placeholder="Released in..." min="1" max="3000" required>
    </div>
    <div class="form-input">
        <label>Duration (min) :</label>
        <input name="duree" id="duree" type="number" min="1" placeholder="min"  required>
    </div>
    <div class="form-input">
        <label>Plot :</label>
        <input name="synopsis" id="synopsis" type="text" placeholder="Plot"  required>
    </div>
    <div class="form-input">
        <label>Image :</label>
        <input name="affiche" id="affiche" type="file" placeholder="Download a file"  required>
    </div>
    <div class="form-input">
        <label for="note">Note :</label>
        <input type="number" name="note" id="note" min="1" max="5"  required>
       
        
    </div>
    <div class="button-input">
        <input name="submitFilm" id="submitFilm" type="submit" class="submit"  required>
    </div>
</form>
</div>
<?php
$titre = "Add Film";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php