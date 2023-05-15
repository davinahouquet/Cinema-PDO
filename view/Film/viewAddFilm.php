<?php

ob_start();

?>


<form action="index.php?action=addFilm" method="POST" class="addFilm">
    
    <h1>Add a movie</h1>
    
    <div class="form-input">
        <label>Title</label>
        <input type="text" placeholder="Title">
    </div>
    <div class="form-input">
        <label>Genre</label>
        <input type="text" placeholder="Genre">
    </div>
    <div class="form-input">
        <label>Release date</label>
        <input type="text" placeholder="Genre">
    </div>
    <div class="form-input">
        <label>Genre</label>
        <input type="text" placeholder="Release date">
    </div>
    <div class="form-input">
        <label>Duration</label>
        <input type="text" placeholder="Duration"> min
    </div>
    <div class="form-input">
        <label>Plot</label>
        <input type="text" placeholder="Plot">
    </div>
    <div class="form-input">
        <label>Image</label>
        <input type="file" placeholder="Download a file">
    </div>
    <div class="form-input">
        <label>Note</label>
        <div class="stars-container">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
    </div>
    <div class="form-input">
        <input type="submit" class="submit">
    </div>
</form>

<?php
$titre = "Ajouter film";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php