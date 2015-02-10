<!DOCTYPE html>
<html lang="fr">

    <?php
    include_once 'Content/head.html';
    ?>

    <?php
    include_once 'Model/TypeU.php';

    session_start();

    // Si l'utilisateur est connecté
    if (isset($_SESSION['pseudoU'])) {

        // Redirection vers la page d'accueil
        header("Location: ../index.php?a=home");
        
    } else {

        // Sinon, on affiche des champs et un bouton pour qu'il puisse se connecter
        include_once 'Content/login.html';
        
    }
    ?>

</html>
