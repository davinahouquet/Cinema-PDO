<?php

ob_start();

?>


<form action="index.php?action=addFilm" method="POST" class="addFilm">
    
    <h1>Add a role</h1>
    
    <div class="form-input">
        <label>Name : </label>
        <input type="text" placeholder="Name">
    </div>
    <div class="form-input">
        <label>Interpreted by : </label>
        <input type="text" placeholder="this actor/actress">
    </div>
    <div class="form-input">
        <label>In which film(s) :  </label>
        <input type="text" placeholder="In which film can we see this role?">
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