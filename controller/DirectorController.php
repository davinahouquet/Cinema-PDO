<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class DirectorController {

    // Lister les rôles
    public function listDirectors(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteDirector = $pdo->query(" 
            SELECT prenom, nom
            FROM realisateur r
            INNER JOIN personne ON personne.id_personne = r.id_personne
        "); //On exécute la requête de notre choix
        $requeteDirector->execute();
        require ("view/Director/viewDirector.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }

    //Page d'ajout d'un réalisateur
    public function getAddDirector(){
        $pdo = Connect::seConnecter(); 
        $requeteGetAddDirector = $pdo->query("
        SELECT prenom, nom
        FROM realisateur r
        INNER JOIN personne ON personne.id_personne = r.id_personne
        ");
        $requeteGetAddDirector->execute();
        require "view/Director/viewAddDirector.php";
    }
}