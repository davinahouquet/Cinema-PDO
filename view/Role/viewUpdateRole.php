<?php

ob_start();

$role = $requeteRole->fetch();
?>

<div class="container-form">

<form action="index.php?action=updateRole&id=<?=$role["id_role"]?>" method="POST" class="updateFilm">
    
    <h1>Update this role</h1>
    
    <div class="form-input">
        <label for="role">Name :</label>
        <input name="role" type="text"required value="<?= $role["role"] ?>">
    </div>

    <div class="button-input">
        <input type="submit" name="updateRole" value="Update">
    </div>
</form>
</div>

<?php
$titre = "Update Role";
$contenu = ob_get_clean();
require "view/template.php";