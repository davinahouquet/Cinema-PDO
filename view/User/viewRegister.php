<?php
ob_start();
?>

<div class="container-form">

<form enctype="multipart/form-data" action="index.php?action=register" method="POST" class="addFilm">
    
    <h1>Join us ☻</h1>

    <div class="form-input">
        <label for="username">Username : </label>
        <input type="text" name="username">
    </div>
    <div class="form-input">
        <label for="email">Email : </label>
        <input type="email" name="email">
    </div>
    <div class="form-input">
        <label for="password">Password : </label>
        <input type="password" name="password">
    </div>
    <div class="form-input">
        <label for="password1">Password again: </label>
        <input type="password" name="password1">
    </div>
    <!-- <div class="form-input">
        <label for="terms">I accept terms and conditions</label>
        <input type="checkbox"name="terms">
    </div> -->
        <div class="details-film-button">
        <input type="submit" name="submitRegister">
    </div>

</form>
</div>

<p>You already have an account? <a href="index.php?action=login">Sign in →</a></p>
<?php
$titre = "Register";
$contenu = ob_get_clean();
require "view/template.php";