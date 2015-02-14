<?php

session_start();

include_once '../Model/Utilisateur.php';

$nb_erreurs = 0;
$message = "";
$miseajourOK = true;

//Test de la longueur du pseudo
/* NOT YET IMPLEMENTED
  if (!isset($_POST["pseudoU"]) || strlen($_POST["pseudoU"]) <= 5) {
  $miseajourOK = false;
  $message .= "<i>Votre nom d'utilisateur doit contenir au moins 5 caractères.</i>";
  $nb_erreurs++;
  } else {
  $pseudoU = $_POST["pseudoU"];
  }
 */

//Test de la longueur du mot de passe
/* NOT YET IMPLEMENTED
  if (!isset($_POST['mdpU']) || strlen($_POST['mdpU']) <= 5) {
  $miseajourOK = false;
  $message .= "<i>Votre mot de passe doit contenir au moins 5 caractères !</i>";
  $nb_erreurs++;
  }
 */

//Test de la forme du mot de passe
/* NOT YET IMPLEMENTED
  if (!preg_match("#[0-9]#", $_POST["mdpU"])) {
  $miseajourOK = false;
  $message .= "<i>Votre mot de passe doit contenir au moins un chiffre.</i>";
  $nb_erreurs++;
  }


  if ($miseajourOK) {
  $mdpU = $_POST["mdpU"];
  }


  //Comparaison entre le mot de passe et sa confirmation
  if (!isset($_POST['mdpU']) || $_POST['mdpU'] != $_POST['mdpU2']) {
  $miseajourOK = false;
  $message .= "<i>Le mot de passe et sa confirmation ne sont pas identiques.</i>";
  $nb_erreurs++;
  }
 */

//Test de l'adresse email
if (!isset($_POST["emailU"]) || !filter_var($_POST["emailU"], FILTER_VALIDATE_EMAIL)) {
    $miseajourOK = false;
    $message .= "<i>L'adresse e-mail saisie est invalide !</i>";
    $nb_erreurs++;
} else {
    $emailU = $_POST["emailU"];
}

//Test de l'existance du pseudo
/* NOT YET IMPLEMENTED
  if ($miseajourOK) {
  $pseudoU_temp = Utilisateur::findByPseudoU($pseudoU);
  if ($pseudoU_temp->pseudoU == $pseudoU) {
  $miseajourOK = false;
  $message .= "<i>Le pseudonyme saisie est déjà utilisé !</i>";
  $nb_erreurs++;
  }
  }
 */

//Test du téléphone
if (!isset($_POST["telU"]) || strlen($_POST["telU"]) <= -1) {
    $inscriptionOK = false;
    $message .= "<i>Votre numéro de téléphone doit contenir au moins 0 caractère.</i>";
    $nb_erreurs++;
} else {
    $telU = $_POST["telU"];
}

if (!isset($_POST["urlAvatarU"]) || !filter_var($_POST["urlAvatarU"], FILTER_VALIDATE_URL)) {
    $miseajourOK = false;
    $message .= "<i>L'URL de la photo de profil saisi est invalide !</i>";
    $nb_erreurs++;
} else {
    $urlAvatarU = $_POST["urlAvatarU"];
}

//Mise à jour de l'utilisateur dans la base
if ($miseajourOK) {
    $utilisateur = Utilisateur::findById($_POST["idU"]);
    //$utilisateur->pseudoU = $pseudoU;
    //$utilisateur->mdpU = $mdpU;
    //$utilisateur->nomU = $_POST["nomU"];
    //$utilisateur->prenomU = $_POST["prenomU"];
    $utilisateur->emailU = $emailU;
    $utilisateur->telU = $telU;
    $utilisateur->urlAvatarU = $urlAvatarU;
    $utilisateur->update();
    
    //$_SESSION['pseudoU'] = $pseudoU;
    //$_SESSION['nomU'] = $utilisateur->nomU;
    //$_SESSION['prenomU'] = $utilisateur->prenomU;
    $_SESSION['telU'] = $utilisateur->telU;
    $_SESSION['emailU'] = $utilisateur->emailU;
    $_SESSION['urlAvatarU'] = $utilisateur->urlAvatarU;
    
    header("Location: ../index.php?a=accountSettings");
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
    echo "<a href='../index.php?a=adduser'><button><h2>Remplir le formulaire à nouveau</h2></button></a></h2>";
    echo "</center>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
}

