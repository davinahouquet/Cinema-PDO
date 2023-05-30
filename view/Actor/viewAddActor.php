<?php

ob_start();

?>
<div class="container-form">

<form enctype='multipart/form-data' action="index.php?action=addActor" method="post" class="addActor">
    
    <h1>Add an actor/actress</h1>
    
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
            M:<input type="radio" name="sexe" class="radio" value="Homme" >
            F:<input type="radio" name="sexe" class="radio" value="Femme">
    </div>

    <div class="form-input">
        <label for="dateNaissance">Date of birth :</label>
        <input type="date" name="dateNaissance" id="dateNaissance" required>
    </div>
    
    <div class="form-input">
        <input type="submit" class="submit" name="submitActor" id="submitActor">

    </div>
</form>
</div>
<?php
$titre = "Add actor";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php