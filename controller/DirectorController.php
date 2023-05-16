<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class DirectorController {

    // Lister les réalisateurs
    public function listDirectors(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteDirector = $pdo->query(" 
            SELECT id_realisateur, prenom, nom
            FROM realisateur r
            INNER JOIN personne ON personne.id_personne = r.id_personne
        "); //On exécute la requête de notre choix
        $requeteDirector->execute();
        require ("view/Director/viewDirector.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }
    
    //Détails d'un réalisateur
    public function detailsDirector($id){
        $pdo = Connect::seConnecter();
        $requeteDetailsDirector = $pdo->prepare("SELECT id_realisateur, p.prenom, p.nom, p.sexe, DATE_FORMAT(p.dateNaissance, '%d/%m/%Y') AS date_naissance
            FROM realisateur r, personne p
            WHERE r.id_personne = p.id_personne
            AND r.id_realisateur = :id
        ");
        $requeteDetailsDirector->execute(["id" => $id]);

        $requeteFilms = $pdo->prepare("SELECT f.titre, r.id_realisateur
        FROM realisateur r, film f
        WHERE r.id_realisateur = f.id_realisateur
        AND r.id_realisateur = :id");
        $requeteFilms->execute(["id" => $id]);
        require("view/Director/viewDetailsDirector.php");
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