<!DOCTYPE html>
<html lang="fr">
    
<?php
include_once 'Model/TypeU.php';

session_start();

include_once 'Content/head.html';

// Si l'utilisateur est connecté
if (isset($_SESSION['username'])) {

    // On affiche un message, son nom d'utilisateur et un bouton pour se déconnecter
    echo "Vous êtes connectés en tant que " . $_SESSION['username'];
    foreach ($_SESSION['usertypes'] as $idtypeu) {
        echo " (";
        $TypeU = TypeU::findById($idtypeu);
        echo $TypeU->nomTypeU;
        echo ")";
    }
    echo "<form action=\"Controller/disconnection.php\" method=\"GET\">\n";
    echo "<input type=\"submit\" value=\"Se déconnecter\"/>\n";
    echo "</form>\n";
    
} else {

    // Sinon, on affiche des champs et un bouton pour qu'il puisse se connecter
    include_once 'Content/login.html';
    echo "<br>";
    echo "<center><a href=\"signin.php\">S'inscrire</a></center>";
    
}
?>
