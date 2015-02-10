<div id="connecting_bar">

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">E-C-T-L</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    include_once 'Model/TypeU.php';

                    // Barre de connexion
                    // Si l'utilisateur est connecté
                    if (isset($_SESSION['pseudoU'])) {

                        // On affiche un message, son nom d'utilisateur et un bouton pour se déconnecter
                        echo "<li><a href=\"#\">";
                        echo "Vous êtes connectés en tant que <b>" . $_SESSION['prenomU'] . " " . $_SESSION['nomU'] . "</b>";
                        foreach ($_SESSION['typeUs'] as $idtypeu) {
                            echo " (";
                            $TypeU = TypeU::findById($idtypeu);
                            echo "<i>" . $TypeU->nomTypeU . "</i>";
                            echo ")";
                        }
                        echo "  <img src=\"" . $_SESSION['urlAvatarU'] . "\" width=\"30\"/></a></li>";

                        echo "<li><a href=\"#\">";
                        echo "<form action=\"Controller/disconnection.php\" method=\"GET\">\n";
                        echo "<input class=\"btn-disconnect\" type=\"submit\" value=\"Se déconnecter\"/>\n";
                        echo "</form>\n";
                        echo "</a></li>";
                    }
                    ?>
                </ul>
                <!--<form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>-->
            </div>
        </div>
    </nav>


    <!-- OLD
    <?php
    include_once 'Model/TypeU.php';

    // Barre de connexion
    // Si l'utilisateur est connecté
    if (isset($_SESSION['pseudoU'])) {

        // On affiche un message, son nom d'utilisateur et un bouton pour se déconnecter
        echo "Vous êtes connectés en tant que " . $_SESSION['pseudoU'];
        foreach ($_SESSION['typeUs'] as $idtypeu) {
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
        echo "<input type=\"text\" name=\"pseudoU\" value=\"Tixinoo\"/>\n";
        echo "<input type=\"password\" name=\"password\" value=\"toto\"/>\n";
        echo "<input type=\"submit\" value=\"Se connecter\"/>\n";
        echo "</form>\n";
    }
    ?>
    -->

</div>