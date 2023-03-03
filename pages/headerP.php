
<?php
if(session_status()==1) 
{
    header('Location: /profil');
}
if(isset($_COOKIE['token'])){$_SESSION['token']=$_COOKIE['token'];}
if(!isset($_SESSION['token'])) 
{
    header('Location: /');
}
require_once 'config.php';
require_once 'fonctions/getData.php';

?>
<div class="cardsPPhoto">
    <div class="cardPPhoto" style="">
        <div class="photoProfil square">
            <img class="photoProfil" src="https://www.w3schools.com/css/img_lights.jpg">
        </div>
    </div>
    <div class="cardPPhoto" style="">
        <h3><?php echo $data['username']; ?></h3>
        <h4><?php echo $data['firs_name']." ".$data['last_name']; ?></h4>
    </div>
</div>


<div class="line"></div>
<div class="cardsPinfo">
    <div class="cardPinfo" style="text-align: center;">
    26
    </div>
    <div class="cardPinfo" style="text-align: center;">
    108
    </div>
    <div class="cardPinfo" style="text-align: center;">
    291
    </div>
    <div class="cardPinfo" style="text-align: center;">
    publications
    </div>
    <div class="cardPinfo" style="text-align: center;">
    followers
    </div>
    <div class="cardPinfo" style="text-align: center;">
    suivi(e)s
    </div>
</div>
<div class="line"></div>