<?php

namespace Controller;
use Model\Connect;

class UserController{

    // L'action d'aller au choix de se connecter ou s'enregistrer
    public function user(){
        require("view/User/viewUser.php");
    }

    // L'action de s'enregistrer
    public function register(){

        $pdo = Connect::seConnecter();

        if(isset($_POST["submitRegister"])){

            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password1 = filter_input(INPUT_POST, "password1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            
            if($email && $username && $password && $password1){

                //Si les mots de passe ne sont pas identitques
                if($password !== $password1){
                    echo "Failed";
                    exit;
                } 

                //S'ils le sont, on hache le mot de passe
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    
                //Et on ajoute l'utilisateur
                $requete=$pdo->prepare("INSERT INTO utilisateur (email, username, password)
                                    VALUES (:email, :username, :password)");
                $requete->execute([
                    "email"=>$email,
                    "username"=>$username,
                    "password"=>$passwordHash,
                ]);
                // var_dump($passwordHash);die;         
            }
        } require("view/User/viewRegister.php");
    }

    // public function login(){

    //     $pdo = Connect::seConnecter();
    //     if(isset($_POST["submitLogin"])){

    //         $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //         $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //         $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //         if($email !== false && $username !== false && $password !== false){

    //             $requete=$pdo->prepare("INSERT INTO utilisateur (email, username, password)
    //             VALUES (:email, :username, :password");
    //             $requete->execute([
    //                 "email"=>$email,
    //                 "username"=>$username,
    //                 "password"=>$password
    //             ]);
    //         }
    //     }
    //     require("view/User/viewLogin.php");
    // }
}

?>