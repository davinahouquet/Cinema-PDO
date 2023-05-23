<?php

ob_start();

?>
<div class="container-form">

<form enctype='multipart/form-data' action="index.php?action=addDirector" method="POST" class="addDirector">
    
    <h1>Add a director</h1>
    
    <div class="form-input">
        <label for="prenom">First Name :</label>
        <input type="text" placeholder="First Name" name="prenom" id="prenom">
    </div>
    <div class="form-input">
        <label for="nom">Last Name :</label>
        <input type="text" placeholder="Last Name" name="nom" id="nom">
    </div>
    <div class="form-input">

        <label for="sexe">Gender :</label>
            M :</label><input type="radio" name="sexe" id="Homme" value="Homme" >
            F :</label><input type="radio" name="sexe" id="Femme" value="Femme">
    </div>

    <div class="form-input">
        <label for="dateNaissance">Date of birth :</label>
        <input type="date" name="dateNaissance" id="dateNaissance" required>
    </div>
    
    <div class="form-input">
        <input type="submit" class="submit" name="submitDirector" id="submitDirector">
    </div>
</form>
</div>
<?php
$titre = "Add director";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php