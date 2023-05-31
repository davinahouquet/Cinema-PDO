<?php
ob_start();
session_start();
?>

    <div class="user-session">
        
        <a href="#" class="a-session"><i class="fa-solid fa-heart"></i>  Favorites movies</a><br><br><hr><br>
        <a href="#" class="a-session"><i class="fa-regular fa-clock"></i>  To watch later</a>
        
    </div>


<?php
$titre = "User Session";
$contenu = ob_get_clean();
require "view/template.php";