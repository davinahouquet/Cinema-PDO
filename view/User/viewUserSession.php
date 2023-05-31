<?php
ob_start();
?>

<div class="container-form">

    <div class="user-session">
        
        <i class="fa-solid fa-heart"> Favorites movies</i>
        
    </div>
    
</div>

<?php
$titre = "User Session";
$contenu = ob_get_clean();
require "view/template.php";