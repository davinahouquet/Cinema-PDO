<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class CinemaController {

    //Retour à la page d'accueil
    public function landingPage(){
       require "view/LandingPage/viewLandingPage.php";
    }

    // Lister les films
    public function listFilms(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requete = $pdo->query(" 
            SELECT film.titre, film.anneeSortie, TIME_FORMAT(SEC_TO_TIME(film.duree*60), '%k h %i') AS duree, film.synopsis, film.note, personne.prenom, personne.nom
            FROM film, realisateur, personne
            WHERE film.id_realisateur = realisateur.id_realisateur
            AND realisateur.id_personne = personne.id_personne
        "); //On exécute la requête de notre choix
        $requete->execute();
        require ("view/Film/viewFilm.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }

    //Afficher les détails d'un film
    public function detailFilm($id){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteFilm = $pdo->prepare(" 
        SELECT film.titre, film.anneeSortie, TIME_FORMAT(SEC_TO_TIME(film.duree*60), '%k h %i') AS duree, film.synopsis, film.note, personne.prenom, personne.nom
        FROM film, realisateur, personne
        WHERE film.id_realisateur = realisateur.id_realisateur
        AND realisateur.id_personne = personne.id_personne
        AND film.id_film = :id
        "); //On exécute la requête de notre choix
        $requeteFilm->execute(["id" => $id]);
        require ("view/Film/viewdetailFilm.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }


    //Lister les rôles


    //Lister les acteurs
    
    
    //Lister les rélisateurs
}







