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
        ORDER BY titre ASC
        "); //On exécute la requête de notre choix
        $requete->execute();
        require "view/Film/viewFilm.php"; //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }

    //Afficher les détails d'un film
    public function detailFilm($id){
        $pdo = Connect::seConnecter(); 
        
        $requeteFilm = $pdo->prepare(" 
        SELECT realisateur.id_realisateur, film.id_film, film.titre, film.anneeSortie, TIME_FORMAT(SEC_TO_TIME(film.duree*60), '%k h %i') AS duree, film.synopsis, film.note, personne.prenom, personne.nom, film.affiche
        FROM film, realisateur, personne
        WHERE film.id_realisateur = realisateur.id_realisateur
        AND realisateur.id_personne = personne.id_personne
        AND film.id_film = :id
        ");

        $requeteFilm->execute(["id" => $id]);

        $requeteGenre = $pdo->prepare("
        SELECT f.titre, g.nom_genre, g.id_genre
        FROM film f
        INNER JOIN categoriser c ON f.id_film = c.id_film
        INNER JOIN genre g ON g.id_genre = c.id_genre
        AND f.id_film = :id");

        $requeteGenre->execute(["id"=>$id]);

        $requeteCasting = $pdo->prepare("
        SELECT role.id_role, role.role, acteur.id_acteur, personne.prenom, personne.nom, personne.sexe
        FROM film, jouer, acteur, personne, role
        WHERE film.id_film = jouer.id_film
        AND jouer.id_acteur = acteur.id_acteur
        AND acteur.id_personne = personne.id_personne
        AND role.id_role = jouer.id_role
        AND film.id_film = :id");

        $requeteCasting->execute(["id"=>$id]);

        require ("view/Film/viewdetailFilm.php");
    }

     //Page formulaire d'ajout de film
     public function getAddFilm(){
        $pdo = Connect::seConnecter();
        $requeteDirector = $pdo->query("SELECT id_realisateur, prenom, nom
                                FROM realisateur r
                                INNER JOIN personne ON personne.id_personne = r.id_personne
        ");   
        $requeteDirector->execute();
    
        $requeteGenre = $pdo->query("SELECT *
                                FROM genre");
        $requeteGenre-> execute();
        
        require ("view/Film/viewAddFilm.php");
    }
    
    //Ajouter un film
    public function addFilm(){
        
        $pdo = Connect::seConnecter();

        if(isset($_POST["submitFilm"])){   
            // var_dump($_POST["submitFilm"]);       
            if(isset($_FILES["affiche"])){ // Le nom de l'input dans viewAddFilm
                $tmpName = $_FILES["affiche"]["tmp_name"];
                $name = $_FILES["affiche"]["name"];
                $size = $_FILES["affiche"]["size"];
                $error = $_FILES["affiche"]["error"];
                $tabExtension = explode(".", $name); //explode — Scinde une chaîne de caractères en segments-https://www.php.net/manual/fr/function.explode.php
                $extension = strtolower(end($tabExtension)); //Tout en minuscule
                $extensions = ["jpg", "png", "jpeg"];
                $maxTaille = 4000000;
                /* Les extensions + taille de fichier autorisées */
                if(in_array($extension, $extensions) && $size <= $maxTaille && $error == 0){
                    $uniqueName = uniqid("", true);
                    $fileUnique = $uniqueName . "." . $extension;
                    move_uploaded_file($tmpName, "./public/img/".$fileUnique); 
                    $afficheChemin = "./public/img/" . $fileUnique;
                }         
                else {
                    /* S'il n'y pas de fichier (NULL autorisé dans la BDD)*/
                    $afficheChemin = NULL;
                }

                $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $anneeSortie = filter_input(INPUT_POST, "anneeSortie", FILTER_SANITIZE_NUMBER_INT);
                $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
                $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_INT);            
                $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_NUMBER_INT);
            
                $requeteAjouterFilm = $pdo->prepare("INSERT INTO film (titre, anneeSortie, duree, synopsis, note, affiche, id_realisateur)
                                                    VALUES(:titre, :anneeSortie, :duree, :synopsis, :note, :afficheChemin, :realisateur)");
            
            
                $requeteAjouterFilm -> execute([
                    "titre" => $titre,
                    "anneeSortie" => $anneeSortie,
                    "duree" => $duree,
                    "synopsis" => $synopsis,
                    "note" => $note,
                    "afficheChemin" => $afficheChemin,
                    "realisateur" => $realisateur
                ]);
                    
                $requeteGenre = $pdo->query("SELECT id_genre, nom_genre FROM genre");
                $requeteGenre->execute();

                $selectedGenres = isset($_POST["genre"]) ? $_POST["genre"] : [];

                foreach ($selectedGenres as $genre) {
                    $requeteAddGenre = $pdo->prepare("INSERT INTO categoriser (id_film, id_genre) VALUES (LAST_INSERT_ID(), :id_genre)");
                    $requeteAddGenre->execute(["id_genre" => $genre]);
}
            }
        }
        require("view/LandingPage/viewLandingPage.php");
    }
    
    //La page qui permet d'ajouter un casting
    public function getAddCasting(){
        $pdo = Connect::seConnecter();
            $requeteFilm = $pdo->query("SELECT id_film, titre
                                    FROM film");
            $requeteActor = $pdo->query("SELECT a.id_acteur, p.prenom, p.nom
                                          FROM personne p, acteur a
                                          WHERE p.id_personne = a.id_personne");
            $requeteRole = $pdo->query("SELECT id_role, role
                                        FROM role");
            require("view/Film/viewAddCasting.php");
    }
    
    //La fonction du bouton qui ajoute les valeurs
    public function addCasting(){

        $pdo = Connect::seConnecter();

        $requeteFilm = $pdo->query("SELECT id_film, titre
        FROM film");
        $requeteActor = $pdo->query("SELECT a.id_acteur, p.prenom, p.nom
              FROM personne p, acteur a
              WHERE p.id_personne = a.id_personne");
        $requeteRole = $pdo->query("SELECT id_role, role
            FROM role");

        if(isset($_POST["submitCasting"])){

            $film= filter_input(INPUT_POST, "film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $acteur = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            

            if($film !== false && $role !== false && $acteur){

                $requeteAddCasting = $pdo->prepare("INSERT INTO jouer (id_film, id_acteur, id_role)
                                                    VALUES (:film, :acteur, :role)");


                $requeteAddCasting -> execute([
                    "film" => $film,
                    "role" => $role,
                    "acteur" => $acteur,
                ]);     
            }
        }
        require("view/LandingPage/viewLandingPage.php");
    }
        
    //Supprimer un film
    public function deleteFilm($id){

        $pdo = Connect::seConnecter();
        if(isset($_POST["deleteFilm"])){
            
            $requeteDeleteFilmJouer = $pdo->prepare("DELETE FROM jouer WHERE id_film = :id"); //D'abord supprimer les clés étrangères
            $requeteDeleteFilmJouer ->execute(["id"=>$id]);

            $requeteDeleteFilmCategoriser = $pdo->prepare("DELETE FROM categoriser WHERE id_film = :id");
            $requeteDeleteFilmCategoriser->execute(["id"=>$id]);

            $requeteDeleteFilm = $pdo->prepare("DELETE FROM film WHERE id_film = :id");
            $requeteDeleteFilm->execute(["id"=>$id]);
        }
        header("Location: index.php?action=listFilms");
        require("view/LandingPage/viewLandingPage.php");
    }
    
    //Mettre à jour les informations d'un film
    public function updateFilm($id){
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare(" 
        SELECT film.id_film, film.titre, film.anneeSortie, film.duree, film.synopsis, film.note, personne.prenom, personne.nom
        FROM film, realisateur, personne
        WHERE film.id_realisateur = realisateur.id_realisateur
        AND realisateur.id_personne = personne.id_personne
        AND film.id_film = :id
        ");        
        $requete->execute(["id" => $id]);
        
        // D'abord on affiche les infos déjà existantes grâce à query
        $requeteDirector = $pdo->query("SELECT id_realisateur, prenom, nom
                                        FROM realisateur r
                                        INNER JOIN personne ON personne.id_personne = r.id_personne
        ");   
        $requeteDirector->execute();
        
        $requeteGenre = $pdo->query("SELECT id_genre, nom_genre
                                    FROM genre");
        $requeteGenre-> execute();

        // Ensuite, seulement si l'action d'update est appelée on execute
        if(isset($_POST["updateFilm"])){   
                 
            if(isset($_FILES["affiche"])){ // Le nom de l'input dans viewUpdateFilm
                $tmpName = $_FILES["affiche"]["tmp_name"];
                $name = $_FILES["affiche"]["name"];
                $size = $_FILES["affiche"]["size"];
                $error = $_FILES["affiche"]["error"];
                $tabExtension = explode(".", $name); //explode — Scinde une chaîne de caractères en segments-https://www.php.net/manual/fr/function.explode.php
                $extension = strtolower(end($tabExtension)); //Tout en minuscule
                $extensions = ["jpg", "png", "jpeg"];
                $maxTaille = 4000000;
                /* Les extensions + taille de fichier autorisées */
                if(in_array($extension, $extensions) && $size <= $maxTaille && $error == 0){
                    $uniqueName = uniqid("", true);
                    $fileUnique = $uniqueName . "." . $extension;
                    move_uploaded_file($tmpName, "./public/img/".$fileUnique); 
                    $afficheChemin = "./public/img/" . $fileUnique;
                }         
                else {
                    /* S'il n'y pas de fichier (NULL autorisé dans la BDD)*/
                    $afficheChemin = NULL;
                }

                $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $anneeSortie = filter_input(INPUT_POST, "anneeSortie", FILTER_SANITIZE_NUMBER_INT);
                $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
                $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_INT);            
                $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_NUMBER_INT);

                if($titre !== false && $anneeSortie !== false && $duree !== false && $synopsis !== false && $note !== false && $realisateur){

                                
                //Update Film
                $requeteUpdateFilm = $pdo->prepare("UPDATE film SET titre = :titre, anneeSortie = :anneeSortie, duree = :duree, synopsis = :synopsis, affiche = :afficheChemin, note = :note, id_realisateur = :realisateur WHERE id_film = :id");
                $requeteUpdateFilm->execute([
                    "titre" => $titre,
                    "anneeSortie" => $anneeSortie,
                    "duree" => $duree,
                    "synopsis" => $synopsis,
                    "afficheChemin" => $afficheChemin,
                    "note" => $note,
                    "realisateur" => $realisateur,
                    "id" => $id
                ]);

                // Supprimer les genres précédents
                $requeteRemoveGenres = $pdo->prepare("DELETE FROM categoriser WHERE id_film = :id");
                $requeteRemoveGenres->execute(["id" => $id]);


                // var_dump($_POST);die;
                //Update genre
                $selectedGenres = $_POST["genre"];
                
                foreach ($selectedGenres as $genre) {

                    $requeteUpdateGenre = $pdo->prepare("INSERT INTO categoriser (id_film, id_genre) VALUES (:id_film, :id_genre)");
                    $requeteUpdateGenre->execute(["id_film" => $id, "id_genre" => $genre]);
                }
            }
        }
        }
        require("view/Film/viewUpdateFilm.php");
    }
    
} //Fermeture classe







