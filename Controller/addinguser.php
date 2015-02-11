<?php

include_once '../Model/Inscription.php';

$nb_erreurs = 0;
$message = "";
$inscriptionOK = true;

    //Test de la longueur du code
    if (!isset($_POST["codeI"]) || strlen($_POST["codeI"]) <= 5){
        $inscriptionOK = false;
        $message .= "<p>- Le code d'inscription doit contenir au moins 5 caractères.</p>";
        $nb_erreurs++;
    }
    else {
        $codeI = $_POST["codeI"];
    }
    
    //Test de la date
    if (!isset($_POST["validiteI"]) || !filter_var($_POST["validiteI"], FILTER_VALIDATE_DATE)) {
        $inscriptionOK = false;
        $message .= "<p>- La date saisie est invalide !</p>";
        $nb_erreurs++;
    }
    else{
        $validiteI = $_POST["validiteI"];
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
    }
    */
    
    //Ajout de l'inscription dans la base
    if ($inscriptionOK){
        echo "<p> Félicitations ! Tout s'est déroulé avec succès !<br>Un nouvel utilisateur du type admin pourra s'incrire avec le code 1234 jusqu'au 10/10/2015 !</p>";
        $utilisateur = new Utilisateur();
        $utilisateur->codeI = $codeI;
        $utilisateur->mdpU = $mdpU;
        $utilisateur->nomU = $_POST["nomU"];
        $utilisateur->prenomU = $_POST["prenomU"];
        $utilisateur->validiteI = $validiteI;
        $utilisateur->telU = $_POST["telU"];
        $utilisateur->urlAvatarU = $urlAvatarU;
        $utilisateur->insert();
    } else {
        echo "<p>Votre formulaire d'inscription contient les ".$nb_erreurs." erreurs suivantes: </p>";
        echo $message;
    }