<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class GenreController {

    //Lister les genres
    public function listGenres(){
        $pdo = Connect::seConnecter();
        $requeteGenre = $pdo->query("SELECT genre.id_genre, genre.nom_genre FROM genre");
        $requeteGenre->execute();
        require "view/Genre/viewGenre.php";
    }

    //Afficher les détails d'un genre (films reliés)
    public function detailsGenre($id){
        $pdo = Connect::seConnecter(); 
        $requeteDetailsGenre = $pdo->prepare("SELECT id_genre, nom_genre FROM genre WHERE id_genre = :id
        ");
        $requeteDetailsGenre->execute(["id"=> $id]);

        $requeteFilm = $pdo->prepare("SELECT f.titre, g.id_genre
                        FROM categoriser c, film f, genre g
                        WHERE c.id_film = f.id_film
                        AND c.id_genre = g.id_genre
                        AND g.id_genre = :id");
        $requeteFilm->execute(["id" => $id]);
        require("view/Genre/viewdetailsGenre.php");
    }

    //Aller à la page d'ajout d'un genre
    public function getAddGenre(){
        $pdo = Connect::seConnecter(); 
        $requeteGetAddGenre = $pdo->query("SELECT f.titre
        FROM categoriser c, film f, genre g
        WHERE c.id_film = f.id_film
        AND c.id_genre = g.id_genre");
        $requeteGetAddGenre->execute();
        require "view/Genre/viewAddGenre.php";
    }

    //Ajouter genre
    public function addGenre(){
        if(isset($_POST["submitGenre"])){
            $genre = filter_input(INPUT_POST, "nom_genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($genre){
                $pdo = Connect::seConnecter(); 
                $requeteAddGenre = $pdo->prepare("INSERT INTO genre (nom_genre) VALUES (:genre)");
                $requeteAddGenre->execute(["genre" => $genre]);
            }
        }
        require("view/LandingPage/viewLandingPage.php");
    }

    //Supprimer un genre
    public function deleteGenre($id){

        if(isset($_POST["deleteGenre"])){  
            $pdo = Connect::seConnecter(); 
            $requeteDeleteGenre = $pdo->prepare("DELETE FROM genre WHERE id_genre = :id");
            $requeteDeleteGenre->execute(["id" => $id]);
        }
         require("view/LandingPage/viewLandingPage.php");
    }
}







