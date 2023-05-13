<?php

use Controller\CinemaController;//On "use" le controller Cinema
use Controller\GenreController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
}); //On autocharge les classes du projet

$ctrlCinema = new CinemaController(); //On instancie le controller Cinema
$ctrlGenre = new GenreController();
$id = (isset($_GET["id"])) ? $_GET["id"] : null;
if(isset($_GET["action"])){ //En fonction de l'action détectée dans l'URL via la propriété "action" on interagit avec la bonne méthode du controller
    
    switch ($_GET["action"]){

        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "listGenres" : $ctrlGenre->listGenres();break;
        case "detailsGenre" : $ctrlGenre->detailsGenre($id);break;
    }
}