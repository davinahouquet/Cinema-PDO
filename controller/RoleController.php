<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class RoleController {

    // Lister les rôles
    public function listRoles(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteRole = $pdo->query(" 
        SELECT role
        FROM role
        "); //On exécute la requête de notre choix
        $requeteRole->execute();
        require ("view/Role/viewRole.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }
}