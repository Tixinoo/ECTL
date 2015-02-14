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

//Test de la description
if (!isset($_POST["descD"]) || strlen($_POST["descD"]) <= 2) {
    $documentOK = false;
    $message .= "<li>La description doit contenir au moins 3 caractères.</li>";
    $nb_erreurs++;
} else {
    $descD = $_POST["descD"];
}

//Test du contenu
if (!isset($_POST["contenuD"]) || strlen($_POST["contenuD"]) <= -1) {
    $documentOK = false;
    $message .= "<li>Le contenu doit contenir au moins 0 caractère.</li>";
    $nb_erreurs++;
} else {
    $contenuD = $_POST["contenuD"];
}

//Test du type
if(isset($_POST["idTypeD"])) {
    $idTypeD = $_POST["idTypeD"];
} else {
    $documentOK = false;
    $message .= "<li>Le type n'est pas correct.</li>";
    $nb_erreurs++;
}

/* ENVOI DU FICHIER */
$dossier = "../Document/";
//$fichier = $dossier . basename($_FILES["inputFileD"]["name"]);
$fichier = $dossier . str_replace(" ", "-", $nomD) . ".pdf";
$envoiFichierOK = 1;
$extension = pathinfo($fichier,PATHINFO_EXTENSION);

// Test de l'existance du fichier
if (file_exists($fichier)) {
    $envoiFichierOK = 0;
}

// Test de la taille (20Mo = 20971520b)
if ($_FILES["inputFileD"]["size"] > 20971520) {
    $envoiFichierOK = 0;
}
// Test du format
if($extension != "pdf") {
    $envoiFichierOK = 0;
}

// Test final
if ($envoiFichierOK == 0) {
    $message .= "<li>Le fichier sélectionné n'est pas correct.</li>";
} else {
    if (move_uploaded_file($_FILES["inputFileD"]["tmp_name"], $fichier)) {
        echo "Le fichier ". basename( $_FILES["inputFileD"]["name"]). " a été correctement importé dans l'ECTL.";
    } else {
        $message .= "<li>Un problème est survenur lors de l'envoi du fichier.</li>";
    }
}
/* FIN ENVOI FICHIER */

$urlD = "Document/" . str_replace(" ", "-", $nomD) . ".pdf";

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
    // OLD:
    //echo "<p> Félicitations ! Tout s'est déroulé avec succès !<br>Un nouveau document a été importé dans l'ECTL.<br> Les détails de cet ajout sont les suivants : <ul><li>Le nouveau document aura pour titre <b>" . $nomD . "</b></li> <li>Sa description est la suivante : <b>" . $descD . "</b></li> <li>Son type est <b>" . $idTypeD . "</b></li></li>";
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