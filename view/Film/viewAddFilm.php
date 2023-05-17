<?php

ob_start();

?>

<div class="container-form">

<form action="index.php?action=addFilm" method="POST" class="addFilm">
    
    <h1>Add a movie</h1>
    
    <div class="form-input">
        <label for="title">Title :</label>
        <input name="titre" id="titre" type="text" placeholder="Title">
    </div>
    <div class="form-input">
        <label for="director">Director :</label>
            <select class="select">

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
        
        <select name="genre" type="text" placeholder="Genre" class="select">
            <option>Exemple</option> 
            <option>Exemple</option>
        </select>
    </div>


    <div class="form-input">
        <label>Release date</label>
        <input name="dateSortie" id="dateSortie" type="text" placeholder="Released in...">
    </div>
    <div class="form-input">
        <label>Duration (min)</label>
        <input name="duree" id="duree" type="text" placeholder="min">
    </div>
    <div class="form-input">
        <label>Plot</label>
        <input name="synopsis" id="synopsis" type="text" placeholder="Plot">
    </div>
    <div class="form-input">
        <label>Image</label>
        <input name="affiche" id="affiche" type="file" placeholder="Download a file">
    </div>
    <div class="form-input">
        <label for="note">Note</label>
        <input type="number" name="note" id="note" min="0" max="5">
       
        
    </div>
    <div class="button-input">
        <input name="submitFilm" id="submitFilm" type="submit" class="submit">
    </div>
</form>
</div>
<?php
$titre = "Add Film";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php