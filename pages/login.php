<?php
if(session_status()==1) 
{
    header('Location: /login');
}
?>
<style>
    /* Styles pour la fenêtre de connexion */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .modal-all {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        width: 30%;
        border: 1px solid #888;
    }

    .modal-all {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        width: 30%;
        border: 1px solid #888;
    }
</style>
<div id="login-modal" class="modal">
    <div class="modal-dialog" role="document">

<?php
if($url != '' && $url[0]=="login" && !empty($url[1])) {

    switch($url[1]) {
        case 'success':
        ?>
        <div class="alert alert-success">
            <strong>Succès</strong> inscription réussie !
        </div>
        <?php
        break;

        case 'erreur_saisie':
        ?>
        <div class="alert alert-danger">
            <strong>Erreur</strong> mot de passe ou email incorrect
        </div>
        <?php
        break;
    }        
}
?>

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Connexion</h5>
                <button type="button" class="close" onclick="document.getElementById('login-modal').style.display='none';changeURL('/');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="fonctions/login_processing.php" method="POST">
                <label for='email'>email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="on"/>
                <br />
                <label for='password'>mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required autocomplete="off"/>
                <br />
                <button type="submit" class="btn btn-success">Connexion</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="register();changeURL('/register');" class="cancel-button">Inscription</button>
            </div>
        </div>
    </div>
</div>
<script>
<?php
    if($url != '' && $url[0]=="login"){
        ?>
        document.getElementById('login-modal').style.display='block';
        <?php
    }
?>
</script>
<script type="text/javascript" src="fonctions/LogRegist.js"></script>
