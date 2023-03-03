<?php
if(session_status()==1) 
{
    header('Location: /');
}
?>               
<div id="chPassword-modal" class="modal">
    <div class="modal-dialog" role="document">
        <div id="message-chP"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Changer mon mot de passe</h5>
                <button type="button" class="close" onclick="document.getElementById('chPassword-modal').style.display='none';changeURL('/setting');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-chP"  method="POST">
                    <label for='current_password'>Mot de passe actuel</label>
                    <input type="password" name="current_password" class="form-control" required autocomplete="off"/>
                    <br />
                    <label for='new_password'>Nouveau mot de passe</label>
                    <input type="password" name="new_password" class="form-control" required autocomplete="off"/>
                    <br />
                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                    <input type="password" name="new_password_retype" class="form-control" required autocomplete="off"/>
                    <br />
                    <button type="button" onclick="ErreurMessage('form-chP','fonctions/chPassword_processing.php','message-chP');" class="btn btn-success">Sauvegarder</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.getElementById('chPassword-modal').style.display='none';changeURL('/setting');">Fermer</button>
            </div>
        </div>
    </div>
</div>