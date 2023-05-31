<?php
ob_start();
?>

<div class="container-form">

    <div class="user-choice">
        <p>You already have an account ?</p>
        <button class="cinema-button">
            <a href="index.php?action=login">Login</a>
        </button>
    </div>
    <div class="user-choice">
        <p>Create an account, join  us !</p>
        <button class="cinema-button">
        <a href="index.php?action=register">Sign up</a>
        </button>
    </div>
</div>

<?php
$titre = "User";
$contenu = ob_get_clean();
require "view/template.php";