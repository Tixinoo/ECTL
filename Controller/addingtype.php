<?php

include_once '../Model/TypeD.php';

$nb_erreurs = 0;
$message = "";
$typedOK = true;

//Test du nom
if (!isset($_POST["nomTypeD"]) || strlen($_POST["nomTypeD"]) <= 2) {
    $typedOK = false;
    $message .= "<li>Le titre doit contenir au moins 3 caractères.</li>";
    $nb_erreurs++;
} else {
    $nomTypeD = $_POST["nomTypeD"];
}

//Test de la description
if (!isset($_POST["descTypeD"]) || strlen($_POST["descTypeD"]) <= 2) {
    $typedOK = false;
    $message .= "<li>La description doit contenir au moins 3 caractères.</li>";
    $nb_erreurs++;
} else {
    $descTypeD = $_POST["descTypeD"];
}

//Ajout de l'inscription dans la base
if ($typedOK) {
    $typed = new TypeD();
    $typed->nomTypeD = $nomTypeD;
    $typed->descTypeD = $descTypeD;
    $typed->insert();
    header("Location: ../index.php");
    // OLD:
    //echo "<p> Félicitations ! Tout s'est déroulé avec succès !<br>Une nouvelle catégorie a été ajoutée dans l'ECTL.<br> Les détails de cet ajout sont les suivants : <ul><li>La nouvelle catégorie aura pour titre <b>" . $nomTypeD . "</b></li> <li>Sa description est la suivante : <b>" . $descTypeD . "</b></li></li>";
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