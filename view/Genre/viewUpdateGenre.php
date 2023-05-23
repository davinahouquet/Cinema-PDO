<?php

ob_start();

$genre = $requeteGenre->fetch();
?>

<div class="container-form">

<form action="index.php?action=updateGenre&id=<?=$genre["id_genre"]?>" method="POST" class="updateFilm">
    
    <h1>Update this genre</h1>
    
    <div class="form-input">
        <label for="genre">Name :</label>
        <input name="genre" type="text"required value="<?= $genre["nom_genre"] ?>">
    </div>

    <div class="button-input">
        <input type="submit" name="updateGenre" value="Update">
    </div>
</form>
</div>

<?php
$titre = "Update Genre";
$contenu = ob_get_clean();
require "view/template.php";