<?php
ob_start();
?>

<div class="container-form">

<form enctype="multipart/form-data" action="index.php?action=register" method="POST" class="addFilm">
    
    <h1>Login</h1>

    <div class="form-input">
        <label for="email">Email : </label>
        <input type="text" name="email">
    </div>
    <div class="form-input">
        <label for="email">Username : </label>
        <input type="email" name="username">
    </div>
    <div class="form-input">
        <label for="email">Password : </label>
        <input type="password" name="password">
    </div>
    <div class="details-film-button">
        <input type="submit" name="submitLogin">
    </div>
    <p><a href="#">I forgot my username or password</a></p>
</div>

<p>You don't have an account? Don't worry, <a href="#">click here</a> to sign up</p>
<?php
$titre = "Login";
$contenu = ob_get_clean();
require "view/template.php";