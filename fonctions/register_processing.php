<?php
    session_start(); 
    require_once '../config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['username']) && !empty($_POST['birthday']))
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $username = htmlspecialchars($_POST['username']);
        $birthday = htmlspecialchars($_POST['birthday']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT username, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0)
        { 
            if(strlen($username) <= 100)  // On verifie que la longueur du pseudo <= 100
            {
                if(strlen($email) <= 100) // On verifie que la longueur du mail <= 100
                { 
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) // Si l'email est de la bonne forme
                    { 
                        if($password === $password_retype) // si les deux mdp saisis sont bon
                        { 

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                            // On stock l'adresse IP
                            $ip = $_SERVER['REMOTE_ADDR']; 
                            
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(username, email, password, ip, token,birthday) VALUES(:username, :email, :password, :ip, :token, :birthday)');
                            $insert->execute(array(
                                'username' => $username,
                                'email' => $email,
                                'password' => $password,
                                'ip' => $ip,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64)),
                                'birthday' => $birthday
                            ));
                            // On redirige avec le message de succès
                            header('Location: /login/success');
                        }
                        else
                        {
                            header('Location: /register/password');
                        }
                    }
                    else
                    {
                        header('Location: /register/email');
                    }
                }
                else
                {
                    header('Location: /register/email_length');
                }
            }
            else
            {
                header('Location: /register/pseudo_length');
            }
        }
        else
        {
            header('Location: /register/already');
        }
    }
    else
    {
        header('Location: /register');
    }
?>