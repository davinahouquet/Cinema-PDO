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

    public function login(){
        $pdo = Connect::seConnecter();
        
        if(isset($_POST["submitLogin"])){
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            if($email && $password){
                $requete = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
                $requete->execute(["email" => $email]);
                $utilisateur = $requete->fetch();
    
                if($utilisateur && password_verify($password, $utilisateur['password'])){
                    // Connexion réussie
                    echo "Login successful!";
                    $_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur']; // Stockage de l'id_utilisateur dans la session
                    $_SESSION['username'] = $utilisateur['username']; // Stockage du nom d'utilisateur dans la session
                    header("Location:index.php?action=userSession");
                    exit;
                } else {
                    // Identifiants invalides
                    echo "Invalid email or password";
                }
            }
        }
        
        require("view/User/viewLogin.php");
    }

    // Aller sur la page de l'utilisateur, pour userSession
    public function userSession($id_utilisateur){
        
        require("view/User/viewUserSession.php");
    }

    // Supprimer le compte utilisateur
    public function deleteAccount($id_utilisateur){

            $pdo = Connect::seConnecter();
            // Supprimer l'utilisateur de la table utilisateur
            
            $requete = $pdo->prepare("DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $requete->execute(["id_utilisateur" => $id_utilisateur]);
            
            // if (ini_get("session.use_cookies")) {
            //     $params = session_get_cookie_params();
            //         setcookie(session_name(), '', time() - 42000,
            //     $params["path"], $params["domain"],
            // $params["secure"], $params["httponly"]);
            // }
            session_destroy(); //détruit toutes les données associées à la session courante.
            echo "Account deleted";
            header("Location: index.php?action=user");
        
        require("view/User/viewUserSession.php");
    }

    // Se déconnecter
    public function logout(){
        unset($_SESSION["id_utilisateur"]);
        unset($_SESSION["username"]);
        session_unset();
        echo "You had been disconnected";
        header("Location: index.php?action=user");
        exit();
    }

}

?>