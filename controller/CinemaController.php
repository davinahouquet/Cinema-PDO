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
        SELECT film.id_film, film.titre, film.anneeSortie, TIME_FORMAT(SEC_TO_TIME(film.duree*60), '%k h %i') AS duree, film.synopsis, film.note, personne.prenom, personne.nom
        FROM film, realisateur, personne
        WHERE film.id_realisateur = realisateur.id_realisateur
        AND realisateur.id_personne = personne.id_personne
        "); //On exécute la requête de notre choix
        $requete->execute();
        require "view/Film/viewFilm.php"; //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }

    //Afficher les détails d'un film
    public function detailFilm($id){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteFilm = $pdo->prepare(" 
        SELECT realisateur.id_realisateur, film.titre, film.anneeSortie, TIME_FORMAT(SEC_TO_TIME(film.duree*60), '%k h %i') AS duree, film.synopsis, film.note, personne.prenom, personne.nom
        FROM film, realisateur, personne
        WHERE film.id_realisateur = realisateur.id_realisateur
        AND realisateur.id_personne = personne.id_personne
        AND film.id_film = :id
        "); //On exécute la requête de notre choix
        $requeteFilm->execute(["id" => $id]);
        require ("view/Film/viewdetailFilm.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }

    //Page formulaire d'ajout de film
    public function getAddFilm(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteGetAddFilm = $pdo->query(" 
        SELECT film.titre, film.anneeSortie, TIME_FORMAT(SEC_TO_TIME(film.duree*60), '%k h %i') AS duree, film.synopsis, film.note, personne.prenom, personne.nom
        FROM film, realisateur, personne
        WHERE film.id_realisateur = realisateur.id_realisateur
        AND realisateur.id_personne = personne.id_personne
        "); //On exécute la requête de notre choix
        $requeteGetAddFilm->execute();
        require ("view/Film/viewAddFilm.php");
    }

    //Ajouter un film
    public function addFilm(){

        $pdo = Connect::seConnecter();
        $requeteDirector = $pdo->query(" 
            SELECT id_realisateur, prenom, nom
            FROM realisateur r
            INNER JOIN personne ON personne.id_personne = r.id_personne
        ");
        
        $requeteDirector->execute();

        if(isset($_POST["submitFilm"])){

            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $anneSortie = filter_input(INPUT_POST, "anneSortie", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $affiche = filter_input(INPUT_POST, "affiche", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($titre && $anneSortie && $duree && $synopsis && $note && $affiche){
                $requeteAjouterFilm = $pdo->prepare("INSERT INTO film (titre, anneeSortie, duree, synopsis, note, affiche)
                VALUES(:titre, :anneSortie, :duree, :synopsis, :note, :affiche)");

                $requeteAjouterFilm -> execute([
                    "titre" => $titre,
                    "anneSortie" => $anneSortie,
                    "duree" => $duree,
                    "synopsis" => $synopsis,
                    "note" => $note,
                    "affiche" => $affiche
                ]);
                
                }
            }
            require("view/Film/viewAddFilm.php");
        }
            

} //fermeture class







