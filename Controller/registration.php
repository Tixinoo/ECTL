<?php

include_once '../Model/Utilisateur.php';
include_once '../Model/Inscription.php';

$nb_erreurs = 0;
$message = "";
$inscriptionOK = true;

//Test de la longueur du pseudo
if (!isset($_POST["pseudoU"]) || strlen($_POST["pseudoU"]) <= 2) {
    $inscriptionOK = false;
    $message .= "<li>Votre nom d'utilisateur doit contenir au moins 3 caractères.</li>";
    $nb_erreurs++;
} else {
    $pseudoU = $_POST["pseudoU"];
}


//Test de la longueur du mot de passe
if (!isset($_POST['mdpU']) || strlen($_POST['mdpU']) <= 2) {
    $inscriptionOK = false;
    $message .= "<li>Votre mot de passe doit contenir au moins 3 caractères !</li>";
    $nb_erreurs++;
}

//Test de la forme du mot de passe
if (!preg_match("#[0-9]#", $_POST["mdpU"])) {
    $inscriptionOK = false;
    $message .= "<li>Votre mot de passe doit contenir au moins un chiffre.</li>";
    $nb_erreurs++;
}

if ($inscriptionOK) {
    $mdpU = $_POST["mdpU"];
}

//Comparaison entre le mot de passe et sa confirmation
if (!isset($_POST['mdpU']) || $_POST['mdpU'] != $_POST['mdpU2']) {
    $inscriptionOK = false;
    $message .= "<li>Le mot de passe et sa confirmation ne sont pas identiques.</li>";
    $nb_erreurs++;
}

//Test de l'adresse email
if (!isset($_POST["emailU"]) || !filter_var($_POST["emailU"], FILTER_VALIDATE_EMAIL)) {
    $inscriptionOK = false;
    $message .= "<li>L'adresse e-mail saisie est invalide !</li>";
    $nb_erreurs++;
} else {
    $emailU = $_POST["emailU"];
}

//Test de l'existance du pseudo
if ($inscriptionOK) {
    $pseudoU_temp = Utilisateur::findByPseudoU($pseudoU);
    if ($pseudoU_temp->pseudoU == $pseudoU) {
        $inscriptionOK = false;
        $message .= "<li>Le pseudonyme saisie est déjà utilisé !</li>";
        $nb_erreurs++;
    }
}

//Test du code d'inscription
if (!isset($_POST["codeI"])) {
    $inscriptionOK = false;
    $message .= "<li>Le code d'inscription est invalide !</li>";
    $nb_erreurs++;
} else {
    $codeI = $_POST["codeI"];
    //Test de l'existance et de la validité du code
    $inscription_temp = Inscription::findByCode($codeI);
    if (isset($inscription_temp)) {
        $current_date = date('Y-m-d');
        $validiteI_date = $inscription_temp->validiteI;
        if ($current_date > $validiteI_date) {
            $inscriptionOK = false;
            $message .= "<li>Le code d'inscription n'est plus valable !</li>";
            $nb_erreurs++;
        } else {
            $idTypeU = $inscription_temp->idTypeU;
        }
    } else {
        $inscriptionOK = false;
        $message .= "<li>Le code d'inscription est invalide !</li>";
        $nb_erreurs++;
    }
}

//Test du téléphone
if (!isset($_POST["telU"]) || strlen($_POST["telU"]) <= -1) {
    $inscriptionOK = false;
    $message .= "<li>Votre numéro de téléphone doit contenir au moins 0 caractère.</li>";
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
    echo "<p> Félicitations ! Votre inscription s'est réalisée avec succès !<br>Bienvenue dans l'ECTL !</li>";
    $utilisateur = new Utilisateur();
    $utilisateur->pseudoU = $pseudoU;
    $utilisateur->actifU = true;
    $utilisateur->mdpU = md5($mdpU);
    $utilisateur->nomU = $nomU;
    $utilisateur->prenomU = $prenomU;
    $utilisateur->emailU = $emailU;
    $utilisateur->telU = $telU;
    $utilisateur->urlAvatarU = $urlAvatarU;
    $utilisateur->insert();
    $utilisateur->insertType($idTypeU);

    $to = $utilisateur->emailU;
    $subject = "Bienvenue dans l'ECTL";

    $message .= "<html>";
    $message .= "<head>";
    $message .= "<meta charset=\"utf-8\">";
    $message .= "<title>Erreur ECTL</title>";
    $message .= "<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>";
    $message .= "</head";
    $message .= "<body>";
    $message .= "<div style=\"font-family: Oxygen; padding: 30px;\">";
    $message .= "<h1 style=\"border-bottom: solid black 1px;\">Merci d'avoir rejoint l'Espace Collaborateur TRACTLUX</h1><ul>";
    $message .= "toto";
    $message .= "</ul>";
    $message .= "<center>";
    $message .= "<a href=''><button><h2>Accéder à l'ECTL</h2></button></a></h2>";
    $message .= "</center>";
    $message .= "</div>";
    $message .= "</body>";
    $message .= "</html>";

// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers .= 'From: <antoine.nosal@outlook.com>' . "\r\n";
    $headers .= 'Cc: antoine9412@gmail.com' . "\r\n";

    mail($to, $subject, $message, $headers);


    header("Location: ../index.php");
} else {
    echo "<html>";
    echo "<head>";
    echo "<meta charset=\"utf-8\">";
    echo "<title>Erreur ECTL</title>";
    echo "<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>";
    echo "</head";
    echo "<body>";
    echo "<div style=\"font-family: Oxygen; padding: 30px;\">";
    echo "<h1 style=\"border-bottom: solid black 1px;\">Votre formulaire contient les " . $nb_erreurs . " erreurs suivantes : </h1><ol>";
    echo $message;
    echo "</ol>";
    echo "<center>";
    echo "<a href='../signin.php'><button><h2>Remplir le formulaire à nouveau</h2></button></a></h2>";
    echo "</center>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
}