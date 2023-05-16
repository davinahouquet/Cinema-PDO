<?php

ob_start();

?>


<form enctype='multipart/form-data' action="index.php?action=addRole" method="post" class="addFilm">
    
    <h1>Add a role</h1>
    
    <div class="form-input">
        <label>Name : </label>
        <input type="text" placeholder="Name of the role" name="role" id="role" required>
    </div>
    <!-- <div class="form-input">
        <label>Interpreted by : </label>
        <input type="text" placeholder="this actor/actress">
    </div>
    <div class="form-input">
        <label>In which film(s) :  </label>
        <input type="text" placeholder="In which film can we see this role?">
    </div>
     -->
    <div class="form-input">
        <input type="submit" class="submit" name="submitRole" id="role">
    </div>
</form>

<?php
$titre = "Add a role";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php