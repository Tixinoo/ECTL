<?php

include_once 'Controller/HomeController.php';

$sc = new HomeController();

if (isset($_GET['a'])) {
    $sc->callAction($_GET);
}
else {
    $sc->callAction("default");
}