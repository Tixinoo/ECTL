<?php

include_once '../Model/TypeD.php';

$nb_erreurs = 0;
$message = "";
$typedOK = true;

//Test du nom
if (!isset($_POST["nomTypeD"]) || strlen($_POST["nomTypeD"]) <= 5) {
    $typedOK = false;
    $message .= "<p>- Le titre doit contenir au moins 5 caractères.</p>";
    $nb_erreurs++;
} else {
    $nomTypeD = $_POST["nomTypeD"];
}

//Test de la description
if (!isset($_POST["descTypeD"]) || strlen($_POST["descTypeD"]) <= 10) {
    $typedOK = false;
    $message .= "<p>- La description doit contenir au moins 10 caractères.</p>";
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
    echo "<p> Félicitations ! Tout s'est déroulé avec succès !<br>Une nouvelle catégorie a été ajoutée dans l'ECTL.<br> Les détails de cet ajout sont les suivants : <ul><li>La nouvelle catégorie aura pour titre <b>" . $nomTypeD . "</b></li> <li>Sa description est la suivante : <b>" . $descTypeD . "</b></li></p>";
} else {
    echo "<p>Votre formulaire d'ajout contient les " . $nb_erreurs . " erreurs suivantes: </p>";
    echo $message;
}

?>