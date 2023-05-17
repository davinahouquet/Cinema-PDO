<?php

ob_start();

?>

<div class="container-form">

<form action="index.php?action=addCasting" method="POST" class="addCasting">
    
    <h1>Add a casting</h1>
    
</form>

<?php
$titre = "Add Casting";
$contenu = ob_get_clean();
require "view/template.php";