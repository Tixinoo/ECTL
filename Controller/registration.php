<?php

include_once '../Model/Utilisateur.php';
include_once '../Model/Inscription.php';

$nb_erreurs = 0;
$message = "";
$inscriptionOK = true;

//Test de la longueur du pseudo
if (!isset($_POST["pseudoU"]) || strlen($_POST["pseudoU"]) <= 5) {
    $inscriptionOK = false;
    $message .= "<p>- Votre nom d'utilisateur doit contenir au moins 5 caractères.</p>";
    $nb_erreurs++;
} else {
    $pseudoU = $_POST["pseudoU"];
}


//Test de la longueur du mot de passe
if (!isset($_POST['mdpU']) || strlen($_POST['mdpU']) <= 5) {
    $inscriptionOK = false;
    $message .= "<p>- Votre mot de passe doit contenir au moins 5 caractères !</p>";
    $nb_erreurs++;
}

//Test de la forme du mot de passe
if (!preg_match("#[0-9]#", $_POST["mdpU"])) {
    $inscriptionOK = false;
    $message .= "<p>- Votre mot de passe doit contenir au moins un chiffre.</p>";
    $nb_erreurs++;
}

if ($inscriptionOK) {
    $mdpU = $_POST["mdpU"];
}

//Comparaison entre le mot de passe et sa confirmation
if (!isset($_POST['mdpU']) || $_POST['mdpU'] != $_POST['mdpU2']) {
    $inscriptionOK = false;
    $message .= "<p>- Le mot de passe et sa confirmation ne sont pas identiques.</p>";
    $nb_erreurs++;
}

//Test de l'adresse email
if (!isset($_POST["emailU"]) || !filter_var($_POST["emailU"], FILTER_VALIDATE_EMAIL)) {
    $inscriptionOK = false;
    $message .= "<p>- L'adresse e-mail saisie est invalide !</p>";
    $nb_erreurs++;
} else {
    $emailU = $_POST["emailU"];
}

//Test de l'existance du pseudo
if ($inscriptionOK) {
    $pseudoU_temp = Utilisateur::findByPseudoU($pseudoU);
    if ($pseudoU_temp->pseudoU == $pseudoU) {
        $inscriptionOK = false;
        $message .= "<p>- Le pseudonyme saisie est déjà utilisé !</p>";
        $nb_erreurs++;
    }
}

//Test du code d'inscription
if (!isset($_POST["codeI"])) {
    $inscriptionOK = false;
    $message .= "<p>- Le code d'inscription est invalide !</p>";
    $nb_erreurs++;
} else {
    $codeI = $_POST["codeI"];
    //Test de l'existance et de la validité du code
    $inscription_temp = Inscription::findByCode($codeI);
    if (isset($inscription_temp)) {
        $current_date = date('Y-m-d');
        $validiteI_date = $inscription_temp->validiteI;
        echo "toto";
        if ($current_date > $validiteI_date) {
            $inscriptionOK = false;
            $message .= "<p>- Le code d'inscription n'est plus valable !</p>";
            $nb_erreurs++;
        } else {
            $idTypeU = $inscription_temp->idTypeU;
        }
    } else {
        $inscriptionOK = false;
        $message .= "<p>- Le code d'inscription est invalide !</p>";
        $nb_erreurs++;
    }
}

//Test du téléphone
if (!isset($_POST["telU"]) || strlen($_POST["telU"]) <= -1) {
    $inscriptionOK = false;
    $message .= "<p>- Votre numéro de téléphone doit contenir au moins 0 caractère.</p>";
    $nb_erreurs++;
} else {
    $telU = $_POST["telU"];
}

//Test du nom
if (!isset($_POST["nomU"]) || strlen($_POST["nomU"]) < 0) {
    $inscriptionOK = false;
    $message .= "<li>Votre nom doit contenir au moins 1 caractère.</li>";
    $nb_erreurs++;
} else {
    $nomU = $_POST["nomU"];
}

//Test du prénom
if (!isset($_POST["prenomU"]) || strlen($_POST["prenomU"]) < 0) {
    $inscriptionOK = false;
    $message .= "<li>Votre prénom doit contenir au moins 1 caractère.</li>";
    $nb_erreurs++;
} else {
    $prenomU = $_POST["prenomU"];
}

$urlAvatarU = "Image/icon-user.png";

//Ajout de l'utilisateur dans la base
if ($inscriptionOK) {
    echo "<p> Félicitations ! Votre inscription s'est réalisée avec succès !<br>Bienvenue dans l'ECTL !</p>";
    $utilisateur = new Utilisateur();
    $utilisateur->pseudoU = $pseudoU;
    $utilisateur->mdpU = $mdpU;
    $utilisateur->nomU = $nomU;
    $utilisateur->prenomU = $$prenomU;
    $utilisateur->emailU = $emailU;
    $utilisateur->telU = $telU;
    $utilisateur->urlAvatarU = $urlAvatarU;
    $utilisateur->insert();
    $utilisateur->insertType($idTypeU);
} else {
    echo "<p>Votre formulaire d'inscription contient les " . $nb_erreurs . " erreurs suivantes: </p>";
    echo $message;
}