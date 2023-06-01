<?php
ob_start();
// session_start();
?>

    <div class="user-session">
        
        <h2 class="h2-user"><?=$_SESSION["username"]?></h2><hr><br>
        <a href="#" class="a-session"><i class="fa-solid fa-heart"></i>  Favorites movies</a><br><br><hr><br>
        <a href="#" class="a-session"><i class="fa-regular fa-clock"></i>  To watch later</a><br><br><hr><br>
        <a href="index.php?action=logout" class="a-session"><i class="fa-solid fa-power-off"></i> Logout</a><br><br><hr><br>
        <a href="index.php?action=deleteAccount" class="a-session"><i class="fa-solid fa-trash"></i> Delete Account</a>
        
    </div>


<?php
$titre = "User Session";
$contenu = ob_get_clean();
require "view/template.php";