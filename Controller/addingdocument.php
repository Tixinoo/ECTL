<?php

include_once '../Model/Document.php';

$nb_erreurs = 0;
$message = "";
$documentOK = true;

//Test du titre
if (!isset($_POST["nomD"]) || strlen($_POST["nomD"]) <= 5) {
    $documentOK = false;
    $message .= "<p>- Le titre doit contenir au moins 5 caractères.</p>";
    $nb_erreurs++;
} else {
    $nomD = $_POST["nomD"];
}

//Test de la description
if (!isset($_POST["descD"]) || strlen($_POST["descD"]) <= 10) {
    $documentOK = false;
    $message .= "<p>- La description doit contenir au moins 5 caractères.</p>";
    $nb_erreurs++;
} else {
    $descD = $_POST["descD"];
}

//Test du contenu
if (!isset($_POST["contenuD"]) || strlen($_POST["contenuD"]) <= 10) {
    $documentOK = false;
    $message .= "<p>- Le contenu doit contenir au moins 5 caractères.</p>";
    $nb_erreurs++;
} else {
    $contenuD = $_POST["contenuD"];
}

//Test du type
if(isset($_POST["idTypeD"])) {
    $idTypeD = $_POST["idTypeD"];
} else {
    $documentOK = false;
    $message .= "<p>- Le type n'est pas correct.</p>";
    $nb_erreurs++;
}

$urlD = "-";
$publication_idp = "0";

//Ajout de l'inscription dans la base
if ($documentOK) {
    $document = new Document();
    $document->nomD = $nomD;
    $document->descD = $descD;
    $document->contenuD = $contenuD;
    //$document->urlD = $urlD;
    //$document->publication_idp = $publication_idp;
    $document->insert();
    $document->insertType($idTypeD);
    echo "<p> Félicitations ! Tout s'est déroulé avec succès !<br>Un nouveau document a été importé dans l'ECTL.<br> Les détails de cet ajout sont les suivants : <ul><li>Le nouveau document aura pour titre <b>" . $nomD . "</b></li> <li>Sa description est la suivante : <b>" . $descD . "</b></li> <li>Son type est <b>" . $idTypeD . "</b></li></p>";
} else {
    echo "<p>Votre formulaire d'ajout contient les " . $nb_erreurs . " erreurs suivantes: </p>";
    echo $message;
}

?>