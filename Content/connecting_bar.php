<div id="connecting_bar">
    <?php 

    include_once 'Model/TypeU.php';

    // Barre de connexion

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
        echo "<form action=\"Controller/connection.php\" method=\"POST\">\n";
        echo "<input type=\"text\" name=\"username\" value=\"Tixinoo\"/>\n";
        echo "<input type=\"password\" name=\"password\" value=\"toto\"/>\n";
        echo "<input type=\"submit\" value=\"Se connecter\"/>\n";
        echo "</form>\n";

    }
    ?>
</div>