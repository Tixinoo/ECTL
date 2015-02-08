<?php

include_once 'Controller/HomeController.php';

session_start();

if (isset($_SESSION['username'])) {

    $sc = new HomeController();

    if (isset($_GET['a'])) {
        $sc->callAction($_GET);
    }
    else {
        $sc->callAction("default");
    }
    
} else {
    
    header("Location: login.php");
    
}