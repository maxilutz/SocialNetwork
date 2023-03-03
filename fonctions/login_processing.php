<?php 
    session_start();
    require_once '../config.php';
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email);
        $check = $bdd->prepare('SELECT email, password, token FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        // Si l'utilisateur existe
        if($row > 0){
            // mail bon format
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                // mot de passe bon
                if(password_verify($password, $data['password'])){
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['token'] = $data['token'];
                    $temps = 5*24*3600;
                    setcookie ("token", $data['token'],time()+$temps,"/");
                    header('Location: /');
                }
                else header('Location: /login/erreur_saisie');
            }
            else header('Location: /login/erreur_saisie');
        }
        else header('Location: /login/erreur_saisie');
    }
    else header('Location: /login');
?>