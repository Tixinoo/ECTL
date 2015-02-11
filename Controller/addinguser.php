<?php

include_once '../Model/Inscription.php';

$nb_erreurs = 0;
$message = "";
$inscriptionOK = true;

//Test de la longueur du code
if (!isset($_POST["codeI"]) || strlen($_POST["codeI"]) <= 5) {
    $inscriptionOK = false;
    $message .= "<p>- Le code d'inscription doit contenir au moins 5 caractères.</p>";
    $nb_erreurs++;
} else {
    $codeI = $_POST["codeI"];
}

//Test de la date
$validiteI = $_POST["validiteI"];
echo $validiteI;
$validiteI = date_parse($validiteI); // or date_parse_from_format("d/m/Y", $date);
if (checkdate($validiteI['month'], $validiteI['day'], $validiteI['year'])) {
    $validiteI = $validiteI['year'] . "-" . $validiteI['month'] . "-" . $validiteI['day'];
} else {
    $inscriptionOK = false;
    $message .= "<p>- La date saisie est invalide !</p>";
    $nb_erreurs++;
}

//Ajout de l'inscription dans la base
if ($inscriptionOK) {
    $inscription = new Inscription();
    $inscription->codeI = $codeI;
    $inscription->validiteI = $validiteI;
    $inscription->idU = "1";
    $inscription->idTypeU = "1";
    $inscription->insert();
    echo "<p> Félicitations ! Tout s'est déroulé avec succès !<br>Un nouvel utilisateur du type admin pourra s'incrire avec le code 1234 jusqu'au 10/10/2015 !</p>";
} else {
    echo "<p>Votre formulaire d'inscription contient les " . $nb_erreurs . " erreurs suivantes: </p>";
    echo $message;
}