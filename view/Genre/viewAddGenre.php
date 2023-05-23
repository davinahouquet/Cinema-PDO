<?php

ob_start();

?>
<div class="container-form">

<form enctype='multipart/form-data' action="index.php?action=addGenre" method="post" class="addGenre">
    
    <h1>Add a genre</h1>

    <div class="form-input">
        <label>Name : </label>
        <input type="text" placeholder="Name of the genre" name="nom_genre" id="nom_genre" required>
    </div>
    <!-- <div class="form-input">
        <label>Description</label>
        <input type="text" placeholder="How would you describe this genre?">
    </div> -->
    <div class="form-input">
        <input name="submitGenre" type="submit" class="submit" value="Add genre">
    </div>
    
</form>
</div>
<?php
$titre = "Add genre";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php