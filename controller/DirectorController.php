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
            ORDER BY prenom ASC
        "); //On exécute la requête de notre choix
        $requeteDirector->execute();
        require ("view/Director/viewDirector.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }
    
    //Détails d'un réalisateur
    public function detailsDirector($id){
        $pdo = Connect::seConnecter();
        $requeteDetailsDirector = $pdo->prepare("SELECT id_realisateur, p.prenom, p.nom, p.sexe, DATE_FORMAT(p.dateNaissance, '%d/%m/%Y') AS dateNaissance
        FROM realisateur r, personne p
        WHERE r.id_personne = p.id_personne
        AND r.id_realisateur = :id
        ");
        $requeteDetailsDirector->execute(["id" => $id]);

        $requeteFilms = $pdo->prepare("SELECT f.id_film, f.titre, r.id_realisateur
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

    //Ajout d'un réalisateur
    public function addDirector(){

        if(isset($_POST["submitDirector"])){

            //On filtre les données entrées dans les input
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateNaissance = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //Seulement si elles sont existantes et filtrées, on exécute la requête
            if($prenom && $nom && $sexe && $dateNaissance){
                $pdo = Connect::seConnecter();
                $requetePersonne = $pdo->prepare("INSERT INTO personne (prenom, nom, sexe, dateNaissance)
                                          VALUES (:prenom, :nom, :sexe, :dateNaissance)");
                $requetePersonne->execute([
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'sexe' => $sexe,
                    'dateNaissance' => $dateNaissance
                ]);

                $requeteAddDirector = $pdo->prepare("INSERT INTO realisateur(id_personne)
                                                SELECT LAST_INSERT_ID()");
                $requeteAddDirector->execute();

            }
        }
        require("view/LandingPage/viewLandingPage.php");
    }

    //Supprimer un réalisateur
    public function deleteDirector($id){

        if(isset($_POST["deleteDirector"])){

            $pdo = Connect::seConnecter();

            $requeteDeleteDirector = $pdo->prepare("DELETE FROM film WHERE id_realisateur = :id");
            $requeteDeleteDirector->execute(["id"=>$id]);

            $requeteDeleteDirector1 = $pdo->prepare("DELETE FROM realisateur WHERE id_realisateur = :id");
            $requeteDeleteDirector1->execute(["id"=>$id]);

        }
        // header("Location : index.php?action=listDirectors.php");
        require("view/LandingPage/viewLandingPage.php");
    }

    // Mettre à jour réalisateur
    public function updateDirector($id){
        $pdo = Connect::seConnecter();
        $requeteDirector = $pdo->prepare("SELECT id_realisateur, p.prenom, p.nom, p.sexe, p.dateNaissance
                                        FROM realisateur r
                                        JOIN personne p ON p.id_personne = r.id_personne
                                        WHERE r.id_realisateur = :id");
        $requeteDirector->execute(["id"=>$id]);

        if(isset($_POST["updateDirector"])){  

            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateNaissance = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($prenom && $nom && $sexe && $dateNaissance){

                $pdo = Connect::seConnecter(); 
                $requeteUpdateDirector = $pdo->prepare("UPDATE personne 
                INNER JOIN realisateur ON realisateur.id_personne = personne.id_personne
                SET nom = :nom, prenom = :prenom, sexe = :sexe, dateNaissance = :dateNaissance
                WHERE realisateur.id_realisateur = :id                
                ");
                $requeteUpdateDirector ->execute([
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "sexe" => $sexe,
                    "dateNaissance" => $dateNaissance,
                    "id" => $id                    
                ]);
            }
        }
        require("view/Director/viewUpdateDirector.php");
    }
}