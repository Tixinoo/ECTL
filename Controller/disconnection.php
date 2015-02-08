<?php

session_start();

// On détruit les variables de session relatives à l'utilisateur
unset($_SESSION['username']);
unset($_SESSION['password']);

// Redirection vers la page d'accueil
header("Location: ../index.php?a=home");