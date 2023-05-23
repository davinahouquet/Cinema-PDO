<?php

ob_start();

$film = $requete->fetch();
?>

<div class="container-form">

<form action="index.php?action=updateFilm&id=<?=$film["id_film"]?>" method="POST" class="updateFilm">
    
    <h1>Update this movie</h1>
    
    <div class="form-input">
        <label for="titre">Title :</label>
        <input name="titre" id="titre" type="text" placeholder="New title" required>
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
        
        <select name="genre" placeholder="Genre" class="select">

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
        <input name="submitUpdate" value="Update" id="submitUpdate" type="submit" class="submit"  required>
    </div>
</form>
</div>

<?php
$titre = "Update Film";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php