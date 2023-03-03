<?php
if(isset($_COOKIE['token'])){$_SESSION['token']=$_COOKIE['token'];}
if(isset($_SESSION['token'])){
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['token']));
    $data = $req->fetch();
}
else{
    header('Location: /');
}

?>