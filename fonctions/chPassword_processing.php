<?php
    // Démarrage de la session 
    // Include de la base de données
    require_once '../config.php';
    // Si la session n'existe pas 
    if(session_status()==1) 
    {
        session_start();
    }
    if(isset($_COOKIE['token'])){$_SESSION['token']=$_COOKIE['token'];}
    if(!isset($_SESSION['token'])) 
    {
        die();
    }
    function message($text,$type){
        echo "<div class='alert $type'>$text</div>";
    }
    // Si les variables existent 
    if(!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['new_password_retype'])){
        // XSS 
        $current_password = htmlspecialchars($_POST['current_password']);
        $new_password = htmlspecialchars($_POST['new_password']);
        $new_password_retype = htmlspecialchars($_POST['new_password_retype']);

        // On récupère les infos de l'utilisateur
        $check_password  = $bdd->prepare('SELECT password FROM utilisateurs WHERE token = :token');
        $check_password->execute(array(
            "token" => $_SESSION['token']
        ));
        $data_password = $check_password->fetch();
        // Si le mot de passe est le bon
        if(password_verify($current_password, $data_password['password']))
        {
            // Si le mot de passe tapé est bon
            if($new_password === $new_password_retype){

                //info user
                $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
                $req->execute(array($_SESSION['token']));
                $data = $req->fetch();

                // On chiffre le mot de passe
                $cost = ['cost' => 12];
                $new_password = password_hash($new_password, PASSWORD_BCRYPT, $cost);

                // On met à jour la table utiisateurs
                $update = $bdd->prepare("UPDATE utilisateurs SET password = :password , token = :token WHERE id = :id");
                $_SESSION['token']= bin2hex(openssl_random_pseudo_bytes(64));

                // les info a mettre a jours
                $update->execute(array(
                    "password" => $new_password,
                    "token" => $_SESSION['token'],
                    "id" => $data['id']
                ));

                #change token dans les cookie
                setcookie ("token", null,0,"/");
                $temps = 5*24*3600;
                setcookie ("token", $_SESSION['token'],time()+$temps,"/");

                // On redirige
                message("Le mot de passe a bien été modifié !","alert-success");
            }
            else message("Les nouveaux mots de passe sont différents !","alert-danger");
        }
        else message("Le mot de passe actuel est incorrect !","alert-danger");
    }
    else message("tous les champs ne sont pas remplis !","alert-danger");
?>