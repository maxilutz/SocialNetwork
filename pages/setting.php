<?php
if(session_status()==1) 
{
    header('Location: /setting');
}
if(isset($_COOKIE['token'])){$_SESSION['token']=$_COOKIE['token'];}
if(!isset($_SESSION['token'])) 
{
    header('Location: /');
}
?>
<base href="/">
<style>
div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 50%;
}

@media only screen and (max-width: 750px) {
  .responsive {
    width: 100%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<?php
    if(session_status()==1) 
    {
    session_start();
    }
    require_once $_SERVER['DOCUMENT_ROOT'].'/config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['token'])){
        header('Location:/');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['token']));
    $data = $req->fetch();
?>

<div class="container">
<?php
    require $_SERVER['DOCUMENT_ROOT'].'/pages/chInfo.php'; 
?>

    <div class="text-center">
            <hr />
            <a href="fonctions/logout_processing.php" class="btn btn-danger btn-lg">Déconnexion</a>
            <!-- Button trigger modal -->
            
            <button type="button" class="btn btn-info btn-lg" onclick="document.getElementById('chPassword-modal').style.display='block';changeURL('/setting/changePasswords');">
                Changer mon mot de passe
            </button>
            <button type="button" class="btn btn-danger btn-lg" onclick="document.getElementById('chPassword-modal').style.display='none';">
                Supprimer compte
            </button>
    </div>
</div>    
<?php
    require $_SERVER['DOCUMENT_ROOT'].'/pages/chPassword.php'; 
?>
