<?php
    if(session_status()==1) 
    {
        header('Location: /login');
    }   
    //info user
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['token']));
    $data = $req->fetch();
?>

<div class="modal-header">
    
    <h5 class="modal-title">informations personnelles</h5>
    <div id="message-chI"></div>
</div>

<div class="modal-body ">
    <form id="form-chI" method="POST">
        <div>
            <div class="responsive">
                <div class="gallery">
                    <label for='email'>Email</label>
                    <input type="email" name="email" class="form-control btn-lg" required autocomplete="on" value="<?php echo $data['email']; ?>"/>
                </div>
            </div>
            <div class="responsive">
                <div class="gallery">
                    <label for='username'>Username</label>
                    <input type="text" name="username" class="form-control btn-lg" required autocomplete="on" value="<?php echo $data['username']; ?>"/>
                </div>
            </div>
            <div class="responsive">
                <div class="gallery">
                    <label for='firs_name'>First name</label>
                    <input type="text" name="firs_name" class="form-control btn-lg" required autocomplete="on" value="<?php echo $data['firs_name']; ?>"/>
                </div>
            </div>
            <div class="responsive">
                <div class="gallery">
                    <label for='last_name'>Last name</label>
                    <input type="text" name="last_name" class="form-control btn-lg" required autocomplete="on" value="<?php echo $data['last_name']; ?>"/>
                </div>
            </div>
            <div class="responsive">
                <div class="gallery">
                    <label for='birthday'>Birthday</label>
                    <input type="date" name="birthday" class="form-control btn-lg" required autocomplete="on" value="<?php echo $data['birthday']; ?>"/>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <br />
        <br />
        <button type="button" onclick="ErreurMessage('form-chI','fonctions/chInfo_processing.php','message-chI');" class="btn btn-success btn-lg" >Sauvegarder</button>
    </form>
</div>