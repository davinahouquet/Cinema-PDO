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
        if(isset($_POST["submitFilm"])){
            if(isset($_FILES["affiche"])){
                $tmpNom = $_FILES["affiche"]["tmp_name"]; // Le nom temporaire du fichier qui sera chargé sur la machine serveur 
                $nom = $_FILES["affiche"]["name"]; // Le nom original du fichier
                $taille = $_FILES["affiche"]["size"]; // Sa taille en octets
                $error = $_FILES["affiche"]["error"]; // Le code d'erreur associé au téléchargement
            }
            $tabExtension = explode('.', $nom); // on scinde la chaine en enlevant le point, ça devient un tableau
            $extension = strtolower(end($tabExtension)); // On met les caractères en minuscule
            $extensions = ['jpg', 'png', 'jpeg', 'gif']; // Un tableau d'extension que l'on accepte
            $maxTaille = 1000000; // Taille maximale que l'on autorise (1 Mo)
            /* Si le fichier a bien une des extensions accepter et a une taille autorisé */
            if(in_array($extension, $extensions) && $taille <= $maxTaille && $error == 0){
                $uniqueName = uniqid('', true); // On crée un identifiant unique pour l'image
                $fileUnique = $uniqueName . "." . $extension;
                move_uploaded_file($tmpNom, './public/img/'.$fileUnique); // On déplace le fichier dans un dossier que l'on a créer
                $cheminImage = "./public/img/" . $fileUnique; // On stocke le chemin de l'image
            }
            if(!isset($cheminImage)){
                $cheminImage = NULL;
            }

            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $anneeSortie = filter_input(INPUT_POST, "annee_sortie", FILTER_SANITIZE_NUMBER_INT);
            $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_INT);
            $realisateurFilm = filter_input(INPUT_POST, "realisateurFilm", FILTER_SANITIZE_NUMBER_INT);

            $genreFilm = filter_input(INPUT_POST, "genreFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

            $pdo = Connect::seConnecter();
            $requeteFilm = $pdo->prepare("INSERT INTO film (titre, anneeSortie, duree, synopsis, note, affiche, id_realisateur)
                                        VALUES (:titre, :anneeSortie, :duree, :synopsis, :note, :cheminImage, :realisateurFilm)");
            $requeteFilm->execute([
                'titre' => $titre,
                'anneeSortie' => $anneeSortie,
                'duree' => $duree,
                'synopsis' => $synopsis,
                'note' => intval($note),
                'cheminImage' => $cheminImage,
                'realisateurFilm' => $realisateurFilm
            ]);

            $idLast = $pdo->lastInsertId();
            foreach($genreFilm as $genre){
                $requeteGenre = $pdo->prepare("INSERT INTO categoriser (id_film, id_genre)
                                             VALUES (:idLast, :genre)");
                $requeteGenre->execute([
                    'idLast' => $idLast,
                    'genre' => $genre
                ]);
            }
        }
        require("view/LandingPage/viewLandingPage.php");
    }

} //fermeture class







