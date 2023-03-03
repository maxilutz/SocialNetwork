<?php
if(session_status()==1) 
{
    header('Location: /register');
}
?>


<div class="modal" id="register-modal">
    <div class="modal-dialog" role="document">
<?php 
if($url != '' && $url[0]=="login" && !empty($url[1])){
    switch($url[1]){
        case 'success':
        ?>
        <div class="alert alert-success">
            <strong>Succès</strong> inscription réussie !
        </div>
        <?php
        break;

        case 'password':
        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> mot de passe différent
        </div>
        <?php
        break;

        case 'email':
        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> email non valide
        </div>
        <?php
        break;

        case 'email_length':
        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> email trop long
        </div>
        <?php
        break;

        case 'pseudo_length':
        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> pseudo trop long
        </div>
        <?php
        break;
        case 'already':
        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> compte deja existant
        </div>
        <?php
        break;
    }
}
?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Inscription</h5>
                <button type="button" class="close" onclick="document.getElementById('register-modal').style.display='none';changeURL('/');">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
            <form action="fonctions/register_processing.php" method="POST">
                <label for='username'>Pseudo</label>
                <input type="text" name="username" class="form-control" placeholder="Pseudo" required="required" autocomplete="on">
                <br />
                <label for='email'>Email</label>
                <input type="email" name="email"  class="form-control" placeholder="Email" required="required" autocomplete="on">
                <br />
                <label for='password'>Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                <br />
                <label for='password_retype'>Re tapez le mot de passe</label>
                <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                <br />
                <label for='birthday'>Date de naissance</label>
                <input type="date" name="birthday" class="form-control" required="required">
                <br />
                <button class="btn btn-success" type="submit">Inscription</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="login();changeURL('/login');" class="cancel-button">Connexion</button>
        </div>
    </div>
    </div>
</div>
<script>
<?php
#var_dump($_GET);
if($url != '' && $url[0]=="register"){
    ?>
    document.getElementById('register-modal').style.display='block';
    <?php
}
?>
</script>
<script type="text/javascript" src="fonctions/LogRegist.js"></script>