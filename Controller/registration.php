<?php

include_once '../Model/Utilisateur.php';

$nb_erreurs = 0;
$message = "";
$inscriptionOK = true;
        
    //Test de la longueur du pseudo
    if (!isset($_POST["pseudoU"]) || strlen($_POST["pseudoU"]) <= 5){
        $inscriptionOK = false;
        $message .= "<p>- Votre nom d'utilisateur doit contenir au moins 5 caractères.</p>";
        $nb_erreurs++;
    }
    else{
        $pseudoU = $_POST["pseudoU"];
    }


    //Test de la longueur du mot de passe
    if (!isset($_POST['mdpU']) || strlen($_POST['mdpU']) <= 5){
        $inscriptionOK = false;
        $message .= "<p>- Votre mot de passe doit contenir au moins 5 caractères !</p>";
        $nb_erreurs++;
    }

    //Test de la forme du mot de passe
    if(!preg_match("#[0-9]#", $_POST["mdpU"])){
        $inscriptionOK = false;
        $message .= "<p>- Votre mot de passe doit contenir au moins un chiffre.</p>";
        $nb_erreurs++;
    }

    if ($inscriptionOK){
        $mdpU = $_POST["mdpU"];
    }

    //Comparaison entre le mot de passe et sa confirmation
    if (!isset($_POST['mdpU']) || $_POST['mdpU'] != $_POST['mdpU2']){
        $inscriptionOK = false;
        $message .= "<p>- Le mot de passe et sa confirmation ne sont pas identiques.</p>";
        $nb_erreurs++; 
    }

    //Test de l'adresse email
    if (!isset($_POST["emailU"]) || !filter_var($_POST["emailU"], FILTER_VALIDATE_EMAIL)) {
        $inscriptionOK = false;
        $message .= "<p>- L'adresse e-mail saisie est invalide !</p>";
        $nb_erreurs++;
    }
    else{
        $emailU = $_POST["emailU"];
    }

    /*
    //Test de l'existance du pseudo dans la base
    if ($inscriptionOK){
        $check = User::checkUsername($pseudo);
        if ($check != 0){
              $inscriptionOK = false;
              $message .= "<p>- Le nom d'utilisateur ".$pseudo." est déjà pris !</p>";
              $nb_erreurs++;
        }
    }*/


    //Ajout de l'utilisateur dans la base
    if ($inscriptionOK){
        echo "<p> Félicitations ! Votre inscription s'est réalisée avec succès !<br>Bienvenue dans l'ECTL !</p>";
        $utilisateur = new Utilisateur();
        $utilisateur->pseudoU = $pseudoU;
        $utilisateur->mdpU = $mdpU;
        $utilisateur->nomU = $_POST["nomU"];
        $utilisateur->prenomU = $_POST["prenomU"];
        $utilisateur->emailU = $emailU;
        $utilisateur->telU = $_POST["telU"];
        $utilisateur->insert();
    } else {
        echo "<p>Votre formulaire d'inscription contient les ".$nb_erreurs." erreurs suivantes: </p>";
        echo $message;
    }