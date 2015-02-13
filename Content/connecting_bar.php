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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Espace Collaborateur TRACTLUX</a>
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
                        echo "Connectés en tant que <b>" . $_SESSION['prenomU'] . " " . $_SESSION['nomU'] . "</b>";
                        foreach ($_SESSION['typeUs'] as $idtypeu) {
                            echo " (";
                            $TypeU = TypeU::findById($idtypeu);
                            echo "<i>" . $TypeU->nomTypeU . "</i>";
                            echo ")";
                        }
                        echo "  <img src=\"" . $_SESSION['urlAvatarU'] . "\" height=\"30\"/></a></li>";

                        echo "<li><a href=\"#\">";
                        echo "<form action=\"Controller/disconnection.php\" method=\"GET\">\n";
                        echo "<input class=\"btn btn-disconnect\" type=\"submit\" value=\"Se déconnecter\"/>\n";
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

</div>