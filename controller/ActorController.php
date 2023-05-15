<?php

namespace Controller;
use Model\Connect; //On remarquera ici l'utilisation du "use" pour accéder à la classe Connect située dans le namespace "Model"

class ActorController {

    // Lister les rôles
    public function listActors(){
        $pdo = Connect::seConnecter(); //On se connecte
        $requeteActor = $pdo->query(" 
            SELECT prenom, nom
            FROM acteur a
            INNER JOIN personne ON personne.id_personne = a.id_personne
        "); //On exécute la requête de notre choix
        $requeteActor->execute();
        require ("view/Actor/viewActor.php"); //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
    }
}