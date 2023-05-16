<?php

ob_start();

?>


<form action="index.php?action=getaddActor" method="POST" class="addActor">
    
    <h1>Add an actor/actress</h1>
    
    <div class="form-input">
        <label>First Name :</label>
        <input type="text" placeholder="Title" name="prenom">
    </div>
    <div class="form-input">
        <label>Last Name :</label>
        <input type="text" placeholder="Genre" name="nom">
    </div>
    <div class="form-input">
        <label>Gender :</label>
        <input type="radio" name="sexe">M
        <input type="radio" name="sexe">F
    </div>
    <div class="form-input">
        <label>Date of birth :</label>
        <input type="date" name="dateNaissance">
    </div>
    <div class="form-input">
        <label>Image :</label>
        <input type="file" placeholder="Download a file">
    </div>
    <div class="form-input">
        <input type="submit" class="submit" name="submitActor">
    </div>
</form>

<?php
$titre = "Ajouter acteur";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php