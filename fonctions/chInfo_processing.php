<?php
    require_once '../config.php'; // On inclu la connexion à la bdd

    function message($text,$type){
        echo "<div class='alert $type'>$text</div>";
    }

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
    //info user
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['token']));
    $data = $req->fetch();

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['firs_name']) && !empty($_POST['last_name']) && !empty($_POST['birthday'])){
        // XSS 
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $firs_name = htmlspecialchars($_POST['firs_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $birthday = htmlspecialchars($_POST['birthday']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT email FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0 || $email == $data['email'])
        { 
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) // Si l'email est de la bonne forme
            {
                if(strlen($email) <= 100) // On verifie que la longueur du mail <= 100
                { 
                    if(strlen($username) <= 100)  // On verifie que la longueur du pseudo <= 100
                    {
                        if(strlen($firs_name) <= 100)  // On verifie que la longueur du prenon <= 100
                        {
                            if(strlen($last_name) <= 100)  // On verifie que la longueur du nom de famille <= 100
                            {
                                // On met à jour la table utiisateurs
                                $update = $bdd->prepare("UPDATE utilisateurs SET email = :email , username = :username , firs_name = :firs_name , last_name = :last_name , birthday = :birthday WHERE token = :token");

                                // les info a mettre a jours
                                $update->execute(array(
                                    "email" => $email,
                                    "username" => $username,
                                    "firs_name" => $firs_name,
                                    "last_name" => $last_name,
                                    "birthday" => $birthday,
                                    "token" => $_SESSION['token']
                                ));
                                // On redirige avec le message de succès
                                message("Vos infos ont été modifiées !","alert-success");
                            }
                            else message("Nom de famille trop long !","alert-danger");
                        }
                        else message("Prénom trop long !","alert-danger");
                    }
                    else message("Pseudo trop long !","alert-danger");
                }
                else message("Email trop long !","alert-danger");
            }
            else message("Email non valide !","alert-danger");
        }
        else message("Email deja existant !","alert-danger");
    }
    else message("Tous les champs ne sont pas complet !","alert-danger");
?>





