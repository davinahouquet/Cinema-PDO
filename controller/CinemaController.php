<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class CinemaController {

    
        // Lister les films

    public function listFilms(){

        $pdo = Connect::seConnecter(); //On se connecte
        $requete = $pdo->query(" 
            SELECT titre, annee_sortie
            FROM film
        "); //On exécute la requête de notre choix

        require "view/listFilms.php"; //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }
}