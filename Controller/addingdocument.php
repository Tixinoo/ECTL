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
    $message .= "<p>- Le contenu doit contenir au moins 10 caractères.</p>";
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

/* ENVOI DU FICHIER */
$dossier = "../Document/";
$fichier = $dossier . basename($_FILES["inputFileD"]["name"]);
$envoiFichierOK = 1;
$extension = pathinfo($fichier,PATHINFO_EXTENSION);

// Test de l'existance du fichier
if (file_exists($fichier)) {
    $message .= "Désolé, ce fichier existe déjà.";
    $envoiFichierOK = 0;
}

// Test de la taille (20Mo = 20971520b)
if ($_FILES["inputFileD"]["size"] > 20971520) {
    $message .= "Désolé, le fichier est trop volumineux.";
    $envoiFichierOK = 0;
}
// Test du format
if($extension != "pdf") {
    $message .= "Désolé, seuls les fichiers PDF sont acceptés.";
    $envoiFichierOK = 0;
}

// Test final
if ($envoiFichierOK == 0) {
    $message .= "Désolé, il est impossible d'envoyer le fichier sélectionné.";
} else {
    if (move_uploaded_file($_FILES["inputFileD"]["tmp_name"], $fichier)) {
        echo "Le fichier ". basename( $_FILES["inputFileD"]["name"]). " a été correctement importé dans l'ECTL.";
    } else {
        $message .= "Désolé, il y a eu une erreur pendant l'envoi du fichier.";
    }
}
/* FIN ENVOI FICHIER */

$urlD = "Document/" . $_FILES["inputFileD"]["name"];
$publication_idp = "0";

//Ajout de l'inscription dans la base
if ($documentOK) {
    $document = new Document();
    $document->nomD = $nomD;
    $document->descD = $descD;
    $document->contenuD = $contenuD;
    $document->urlD = $urlD;
    //$document->publication_idp = $publication_idp;
    $document->insert();
    $document->insertType($idTypeD);
    echo "<p> Félicitations ! Tout s'est déroulé avec succès !<br>Un nouveau document a été importé dans l'ECTL.<br> Les détails de cet ajout sont les suivants : <ul><li>Le nouveau document aura pour titre <b>" . $nomD . "</b></li> <li>Sa description est la suivante : <b>" . $descD . "</b></li> <li>Son type est <b>" . $idTypeD . "</b></li></p>";
} else {
    echo "<p>Votre formulaire d'ajout contient les " . $nb_erreurs . " erreurs suivantes: </p>";
    echo $message;
}

?>