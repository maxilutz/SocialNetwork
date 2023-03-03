<head>
    <meta charset="UTF-8">
    <base href="/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="maxilutz"/>
    <link href="css/css.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="fonctions/js-fonc.js"></script>
    <script type="text/javascript" src="fonctions/js-erreur.js"></script>
</head>
<?php
session_start();
if(isset($_COOKIE['token'])){$_SESSION['token']=$_COOKIE['token'];}
require_once 'config.php';

$url = '';

if(isset($_GET['url']))
{
    $url = explode('/',$_GET['url']);
}
include 'pages/menu.php'; 
?>
<div id="body">
<?php
if(isset($_SESSION['token'])){
    if($url == '') require 'pages/home.php';
    elseif($url[0] == ('chat')) require 'pages/chat.php';
    elseif($url[0] == ('setting')) require 'pages/setting.php';
    elseif($url[0] == ('profil')) require 'pages/profil.php';
    elseif($url[0] == ('drive')) require 'pages/drive.php';
    else require 'pages/home.php';
}
else{
    require 'pages/home.php';
    require 'pages/login.php';
    require 'pages/register.php';
}
?>
</div>



