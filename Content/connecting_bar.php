<?php 

session_start();

// Barre de connexion

// Si l'utilisateur est connecté
if (isset($_SESSION['username'])) {

    // On affiche un message, son nom d'utilisateur et un bouton pour se déconnecter
    echo "Vous êtes connectés en tant que " . $_SESSION['username'];
    echo "<form action=\"2_controller/disconnection.php\" method=\"GET\">\n";
    echo "<input class=\"bouton\" type=\"submit\" value=\"Se déconnecter\"/>\n";
    echo "</form>\n";
    
} else {

    // Sinon, on affiche des champs et un bouton pour qu'il puisse se connecter
    echo "<form action=\"2_controller/connection.php\" method=\"post\">\n";
    echo "<input class=\"champ\" type=\"text\" name=\"username\" value=\"toto\" size=\"20\"/>\n";
    echo "<input class=\"champ\" type=\"password\" name=\"password\" value=\"mdp\"/>\n";
    echo "<input class=\"bouton\" type=\"submit\" value=\"Se connecter\"/>\n";
    echo "</form>\n";
    
}

    