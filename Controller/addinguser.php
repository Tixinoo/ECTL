<?php

include_once '../Model/Inscription.php';

$nb_erreurs = 0;
$message = "";
$inscriptionOK = true;

//Test de la longueur du code
if (!isset($_POST["codeI"]) || strlen($_POST["codeI"]) <= 2) {
    $inscriptionOK = false;
    $message .= "<li>Le code d'inscription doit contenir au moins 3 caractères.</li>";
    $nb_erreurs++;
} else {
    $codeI = $_POST["codeI"];
}

//Test de la date
$validiteI = $_POST["validiteI"];
$validiteI = date_parse_from_format("d/m/Y", $validiteI); // or date_parse_from_format("d/m/Y", $date);
print_r($validiteI);
if (checkdate($validiteI['month'], $validiteI['day'], $validiteI['year'])) {
    $validiteI = $validiteI['year'] . "-" . $validiteI['month'] . "-" . $validiteI['day'];
} else {
    $inscriptionOK = false;
    $message .= "<li>La date saisie est invalide !</li>";
    $nb_erreurs++;
}

//Test du type
if(isset($_POST["idTypeU"])) {
    $idTypeU = $_POST["idTypeU"];
} else {
    $documentOK = false;
    $message .= "<li>Le type n'est pas correct.</li>";
    $nb_erreurs++;
}

$idU = "1";

//Ajout de l'inscription dans la base
if ($inscriptionOK) {
    $inscription = new Inscription();
    $inscription->codeI = $codeI;
    $inscription->validiteI = $validiteI;
    $inscription->idU = $idU;
    $inscription->idTypeU = $idTypeU;
    $inscription->insert();
    header("Location: ../index.php?a=adduser");
    // OLD:
    //echo "<p> Félicitations ! Tout s'est déroulé avec succès !<br>Un nouvel utilisateur pourra rejoindre l'ECTL.<br> Les détails de cet ajout sont les suivants : <ul><li>Le nouvel utilisateur sera de type <b>" . $idTypeU . "</b></li> <li>Il devra s'inscrire avec le code <b>" . $codeI . "</b></li> <li>Il devra s'inscrire au plus tard le <b>" . $validiteI . "</b> (inclu)</li></li>";
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
?>