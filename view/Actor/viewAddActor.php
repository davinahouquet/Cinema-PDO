<?php

ob_start();

?>


<form action="index.php?action=getaddActor" method="POST" class="addActor">
    
    <h1>Add an actor/actress</h1>
    
    <div class="form-input">
        <label>First Name :</label>
        <input type="text" placeholder="Title">
    </div>
    <div class="form-input">
        <label>Last Name :</label>
        <input type="text" placeholder="Genre">
    </div>
    <div class="form-input">
        <label>Gender :</label>
        <input type="radio">M
        <input type="radio">F
    </div>
    <div class="form-input">
        <label>Date of birth :</label>
        <input type="date">
    </div>
    <div class="form-input">
        <label>Image :</label>
        <input type="file" placeholder="Download a file">
    </div>
    <div class="form-input">
        <input type="submit" class="submit">
    </div>
</form>

<?php
$titre = "Ajouter acteur";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php