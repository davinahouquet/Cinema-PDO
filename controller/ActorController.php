<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class ActorController {

    // Lister les rôles
    public function listActors(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteActor = $pdo->query(" 
            SELECT prenom, nom, id_acteur
            FROM acteur a
            INNER JOIN personne ON personne.id_personne = a.id_personne
            ORDER BY prenom ASC
        "); //On exécute la requête de notre choix
        $requeteActor->execute();
        require ("view/Actor/viewActor.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }
    
    //Afficher détails d'un acteur
    public function detailsActor($id){
        $pdo = Connect::seConnecter();
        $requeteDetailsActor = $pdo->prepare("SELECT id_acteur, p.prenom, p.nom, p.sexe, DATE_FORMAT(p.dateNaissance, '%d/%m/%Y') AS date_naissance
            FROM acteur a, personne p
            WHERE a.id_personne = p.id_personne
            AND a.id_acteur = :id
        ");
        $requeteDetailsActor->execute(["id" => $id]);

        $requeteFilms = $pdo->prepare("SELECT f.titre, a.id_acteur
            FROM acteur a, film f, jouer j
            WHERE a.id_acteur = j.id_acteur
            AND j.id_film = f.id_film
            AND a.id_acteur = :id");
        $requeteFilms->execute(["id" => $id]);
        require("view/Actor/viewDetailsActor.php");
    }

    //Page ajout acteur
    public function getAddActor(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteGetAddActor = $pdo->query(" 
        SELECT prenom, nom
            FROM acteur a
            INNER JOIN personne ON personne.id_personne = a.id_personne
        "); //On exécute la requête de notre choix
        $requeteGetAddActor->execute();
        require ("view/Actor/viewAddActor.php");
    }


    // Fonction d'ajout d'un acteur
    public function addActor(){

        if(isset($_POST["submitActor"])){

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

                $requeteAddActor = $pdo->prepare("INSERT INTO acteur(id_personne)
                                                SELECT LAST_INSERT_ID()");
                $requeteAddActor->execute();

            }
        }
        require("view/LandingPage/viewLandingPage.php");
    }

    //Supprimer acteur
    public function deleteActor($id){
        if(isset($_POST["deleteActor"])){
            $pdo = Connect::seConnecter();
            $requeteDeleteActor = $pdo->prepare("DELETE FROM jouer WHERE id_acteur = :id"); //D'abord supprimer les clés étrangères
            $requeteDeleteActor->execute(["id"=>$id]);

            $requeteDeleteActor1 = $pdo->prepare("DELETE FROM acteur WHERE id_acteur = :id");
            $requeteDeleteActor1->execute(["id"=>$id]);

            // $requeteDeleteActor2 = $pdo->prepare("DELETE FROM personne p
            // JOIN acteur a ON a.id_personne = p.id_personne
            // WHERE a.id_acteur = :id");
            // $requeteDeleteActor2->execute(["id"=>$id]);
        }
        require("view/LandingPage/viewLandingPage.php");
    }
}