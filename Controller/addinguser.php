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
echo "toto;";
$validiteI = $_POST["validiteI"];
$validiteI = date_parse_from_format("d/m/Y", $validiteI); // or date_parse_from_format("d/m/Y", $date);
print_r($validiteI);
echo "titi";
if (checkdate($validiteI['month'], $validiteI['day'], $validiteI['year'])) {
    $validiteI = $validiteI['year'] . "-" . $validiteI['month'] . "-" . $validiteI['day'];
} else {
    $inscriptionOK = false;
    $message .= "<p>- La date saisie est invalide !</p>";
    $nb_erreurs++;
}

//Test du type
if(isset($_POST["idTypeU"])) {
    $idTypeU = $_POST["idTypeU"];
} else {
    $documentOK = false;
    $message .= "<p>- Le type n'est pas correct.</p>";
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
    include_once 'header.php';
    echo "<p> Félicitations ! Tout s'est déroulé avec succès !<br>Un nouvel utilisateur pourra rejoindre l'ECTL.<br> Les détails de cet ajout sont les suivants : <ul><li>Le nouvel utilisateur sera de type <b>" . $idTypeU . "</b></li> <li>Il devra s'inscrire avec le code <b>" . $codeI . "</b></li> <li>Il devra s'inscrire au plus tard le <b>" . $validiteI . "</b> (inclu)</li></p>";
    include_once 'footer.php';
} else {
    include_once 'Content/header.php';
    echo "<p>Votre formulaire d'inscription contient les " . $nb_erreurs . " erreurs suivantes: </p>";
    echo $message;
    include_once 'Content/footer.php';
}
?>