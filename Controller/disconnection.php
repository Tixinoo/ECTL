<?php

session_start();

// On détruit les variables de session relatives à l'utilisateur
unset($_SESSION['username']);
unset($_SESSION['password']);
session_destroy();

// Redirection vers la page d'accueil
header("Location: ../ECTL.php");