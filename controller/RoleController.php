<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class RoleController {

    // Lister les rôles
    public function listRoles(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteRole = $pdo->query(" 
        SELECT id_role, role
        FROM role
        "); //On exécute la requête de notre choix
        $requeteRole->execute();
        require ("view/Role/viewRole.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }

    // Aller à la page d'ajout d'un rôle
    public function getAddRole(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteGetAddRole = $pdo->query(" 
        SELECT role
        FROM role
        "); //On exécute la requête de notre choix
        $requeteGetAddRole->execute();
        require ("view/Role/viewAddRole.php");
    }

    //Afficher les détails d'un rôle
    public function detailsRole($id){
        $pdo = Connect::seConnecter();
            $requeteDetailsRole = $pdo->prepare("SELECT role FROM role WHERE id_role = :id");
            $requeteDetailsRole->execute(["id" => $id]);
            
            $requeteActeur = $pdo->prepare("SELECT f.titre, p.prenom, p.nom
                            FROM film f, jouer j, role r, acteur a, personne p
                            WHERE f.id_film = j.id_film
                            AND j.id_role = r.id_role
                            AND j.id_acteur = a.id_acteur 
                            AND a.id_personne = p.id_personne
                            AND r.id_role = :id");
            $requeteActeur->execute(["id" => $id]);
            require("view/Role/viewDetailsRole.php");
    }

    //Ajouter un role
    public function addRole(){
        if(isset($_POST["submitRole"])){
            $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($role){
                $pdo = Connect::seConnecter(); 
                $requeteAddRole = $pdo->prepare("INSERT INTO role (role) VALUES (:role)");
                $requeteAddRole->execute(["role" => $role]);
            }
        }
        require("view/LandingPage/viewLandingPage.php");
    }
}