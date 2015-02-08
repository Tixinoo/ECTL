<?php

include_once '../Model/Utilisateur.php';

session_start();

// Si l'utilisateur est déjà connecté
if(isset($_SESSION['username'])) {
    // Déconnexion de l'utlisateur
    unset($_SESSION['username'], $_SESSION['userid']);
}

if(isset($_POST['username'], $_POST['password'])) {

    $un = $_POST['username'];
    $pw = $_POST['password'];
    
    // On récupère l'utilisateur
    $user = Utilisateur::findByPseudoU($un);
    
    // Si le mot de passe indiqué est le bon
    if(($pw) == $user->mdpU) {
        //$a = session_start();
        // On enregistre en tant que variables de sessions, son nom d'utilisateur et son id
        $_SESSION['username'] = $un;
        $_SESSION['userid'] = $user->idU;
        $_SESSION['usertypes'] = $user->idTypeUs();
    }
    
}

// Redirection vers la page d'accueil
header("Location: ../index.php?a=home");