<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class GenreController {

    //Lister les genres
    public function listGenres(){
        $pdo = Connect::seConnecter();
        $requeteGenre = $pdo->query("SELECT nom_genre FROM genre");
        $requeteGenre->execute();
        require "view/Genre/viewGenre.php";
    }

    //Afficher les détails d'un genre (films reliés)
    public function detailsGenre($id){
        $pdo = Connect::seConnecter(); 
        $requeteDetailsGenre = $pdo->prepare("SELECT f.titre
        FROM categoriser c, film f, genre g
        WHERE c.id_film = f.id_film
        AND c.id_genre = g.id_genre
        AND g.id_genre = :id");
        $requeteDetailsGenre->execute(["id"=> $id]);
        require "view/Genre/viewDetailsGenre.php";

        $requeteFilm = $pdo->prepare("SELECT f.titre
                        FROM categoriser c, film f, genre g
                        WHERE c.id_film = f.id_film
                        AND c.id_genre = g.id_genre
                        AND g.id_genre = :id");
        $requeteFilm->execute(["id" => $id]);
        require("view/Genre/viewDetailsGenre.php");
    }
}







