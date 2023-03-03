<?php 
    session_start(); 
    session_destroy(); 

    setcookie ("token", null,null,"/");
    header('Location:../'); 
    die();
