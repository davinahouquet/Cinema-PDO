<?php

ob_start();

?>


<form action="index.php?action=addGenre" method="POST" class="addGenre">
    
    <h1>Add a genre</h1>

    <div class="form-input">
        <label>Name</label>
        <input type="text" placeholder="Name of the genre">
    </div>
    <div class="form-input">
        <label>Description</label>
        <input type="text" placeholder="How would you describe this genre?">
    </div>
    <div class="form-input">
        <input type="submit" class="submit">
    </div>
    
</form>

<?php
$titre = "Ajouter film";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php