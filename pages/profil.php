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
?>
<link href="css/profil.css" rel="stylesheet" />
<script type="text/javascript" src="fonctions/js-loadPhotoP.js"></script>

<div id="profil">
  <?php
    include 'pages/headerP.php';
  ?>
  <div id="gallery">
  <?php
    include 'pages/3pProfil.php';
    include 'pages/3pProfil.php';
    include 'pages/3pProfil.php';
    include 'pages/3pProfil.php';
  ?>
  </div>
  <button onclick="gallery();">click</button>
</div>



