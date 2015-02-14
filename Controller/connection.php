<?php

include_once '../Model/Utilisateur.php';

session_start();

// Si l'utilisateur est déjà connecté
if(isset($_SESSION['pseudoU'])) {
    // Déconnexion de l'utlisateur
    unset($_SESSION['pseudoU'], $_SESSION['userid']);
}

if(isset($_POST['pseudoU'], $_POST['mdpU'])) {
    $pseudoU = $_POST['pseudoU'];
    $mdpU = md5($_POST['mdpU']);
    
    // On récupère l'utilisateur
    $utilisateur = Utilisateur::findByPseudoU($pseudoU);
    
    // Si le mot de passe indiqué est le bon
    if(($mdpU) == $utilisateur->mdpU) {
        //$a = session_start();
        // On enregistre en tant que variables de sessions, son nom d'utilisateur et son id
        $_SESSION['idU'] = $utilisateur->idU;
        $_SESSION['pseudoU'] = $pseudoU;
        $_SESSION['nomU'] = $utilisateur->nomU;
        $_SESSION['prenomU'] = $utilisateur->prenomU;
        $_SESSION['telU'] = $utilisateur->telU;
        $_SESSION['emailU'] = $utilisateur->emailU;
        $_SESSION['urlAvatarU'] = $utilisateur->urlAvatarU;
        $_SESSION['typeUs'] = $utilisateur->idTypeUs();

    }

}

// Redirection vers la page d'accueil
header("Location: ../index.php?a=home");