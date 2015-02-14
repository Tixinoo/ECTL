<?php

include_once '../Model/Document.php';

$nb_erreurs = 0;
$message = "";
$documentOK = true;

//Test du titre
if (!isset($_POST["nomD"]) || strlen($_POST["nomD"]) <= 2) {
    $documentOK = false;
    $message .= "<li>Le titre doit contenir au moins 3 caractères.</li>";
    $nb_erreurs++;
} else {
    $nomD = $_POST["nomD"];
}

//Test du contenu
if (!isset($_POST["contenuD"]) || strlen($_POST["contenuD"]) <= 0) {
    $documentOK = false;
    $message .= "<li>Le contenu doit contenir au moins 1 caractère.</li>";
    $nb_erreurs++;
} else {
    $contenuD = $_POST["contenuD"];
}

//Test du type
if (isset($_POST["idTypeD"])) {
    $idTypeD = $_POST["idTypeD"];
} else {
    $documentOK = false;
    $message .= "<li>Le type n'est pas correct.</li>";
    $nb_erreurs++;
}

$descD = "";
$urlD = "";
$publication_idp = "";

//Ajout de l'inscription dans la base
if ($documentOK) {
    $document = new Document();
    $document->nomD = $nomD;
    $document->descD = $descD;
    $document->contenuD = $contenuD;
    $document->urlD = $urlD;
    $document->insert();
    $document->insertType($idTypeD);
    header("Location: ../index.php");
    // OLD :
    //echo "<li> Félicitations ! Tout s'est déroulé avec succès !<br>Une nouvelle news a été ajoutée dans l'ECTL.<br> Les détails de cet ajout sont les suivants : <ul><li>La nouvelle news aura pour titre <b>" . $nomD . "</b></li> <li>Son contenu est contenu : <b>" . $contenuD . "</b></li> <li>Son type est <b>" . $idTypeD . "</b></li></li>";
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
    echo "<a href='../index.php'><button><h2>Remplir le formulaire à nouveau</h2></button></a></h2>";
    echo "</center>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
}
?>