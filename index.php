<?php

//On "use" les controller
use Controller\CinemaController;
use Controller\GenreController;
use Controller\RoleController;
use Controller\ActorController;
use Controller\DirectorController;

//On autocharge les classes du projet
spl_autoload_register(function($class_name){
    include $class_name . '.php';
}); 

//On instancie les controller
$ctrlCinema = new CinemaController();
$ctrlGenre = new GenreController();
$ctrlRole = new RoleController();
$ctrlActor = new ActorController();
$ctrlDirector = new DirectorController();

//En fonction de l'action détectée dans l'URL via la propriété "action" on interagit avec la bonne méthode du controller
$id = (isset($_GET["id"])) ? $_GET["id"] : null;
if(isset($_GET["action"])){ 
    
    switch ($_GET["action"]){

        //FILM
        case "landingPage" : $ctrlCinema->landingPage(); break;
        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "getAddFilm" : $ctrlCinema->getAddFilm(); break;
        // case "addFilm" : $ctrlCinema->addFilm();break;

        //GENRE
        case "listGenres" : $ctrlGenre->listGenres(); break;
        case "detailsGenre" : $ctrlGenre->detailsGenre($id); break;
        case "getAddGenre" : $ctrlGenre->getAddGenre(); break;
        case "addGenre" : $ctrlGenre->addGenre(); break;

        //ROLE
        case "listRoles" : $ctrlRole->listRoles(); break;
        case "detailsRole" : $ctrlRole->detailsRole($id); break;
        case "getAddRole" : $ctrlRole->getAddRole(); break;
        case "addRole" : $ctrlRole->addRole(); break;

        //ACTEUR
        case "listActors" : $ctrlActor->listActors(); break;
        case "detailsActor" : $ctrlActor->detailsActor($id); break;
        case "getAddActor" : $ctrlActor->getAddActor(); break;
        case "addActor" : $ctrlActor->addActor(); break;

        //REALISATEUR
        case "listDirectors" : $ctrlDirector->listDirectors(); break;
        case "detailsDirector" : $ctrlDirector->detailsDirector($id); break;
        case "getAddDirector" : $ctrlDirector->getAddDirector(); break;
        case "addDirector" : $ctrlDirector->addDirector(); break;

    }
}