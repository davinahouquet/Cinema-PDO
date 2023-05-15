<?php

use Controller\CinemaController;//On "use" le controller Cinema
use Controller\GenreController;
use Controller\RoleController;
use Controller\ActorController;
use Controller\DirectorController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
}); //On autocharge les classes du projet

$ctrlCinema = new CinemaController(); //On instancie le controller Cinema
$ctrlGenre = new GenreController();
$ctrlRole = new RoleController();
$ctrlActor = new ActorController();
$ctrlDirector = new DirectorController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;
if(isset($_GET["action"])){ //En fonction de l'action détectée dans l'URL via la propriété "action" on interagit avec la bonne méthode du controller
    
    switch ($_GET["action"]){

        case "landingPage" : $ctrlCinema->landingPage(); break;
        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "listGenres" : $ctrlGenre->listGenres();break;
        case "detailsGenre" : $ctrlGenre->detailsGenre($id);break;
        case "listRoles" : $ctrlRole->listRoles();break;
        case "listActors" : $ctrlActor->listActors(); break;
        case "listDirectors" : $ctrlDirector->listDirectors(); break;

        case "getAddFilm" : $ctrlCinema->getAddFilm(); break;
        case "getAddGenre" : $ctrlGenre->getAddGenre(); break;
        case "getAddRole" : $ctrlRole->getAddRole();break;
        case "getAddActor" : $ctrlActor->getAddActor(); break;
        case "getAddDirector" : $ctrlDirector->getAddDirector(); break;
    }
}