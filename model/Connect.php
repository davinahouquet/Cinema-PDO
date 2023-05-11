<?php

namespace Model;

abstract class Connect { //La classe est abstraite car on n'instanciera jamais la classe Connect puisqu'on aura seulement besoin d'accéder à la méthode "seConnecter"

    const HOST = "localhost";
    const DB = "cinema";
    const USER = "root";
    const PASS = "";

    public static function seConnecter() { //on se contente de déclarer la connexion à la base de données
        try {
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8",self::USER, self::PASS);
        } catch(\PDOException $ex) {
            return $ex->getMessage();
        }
    }
}