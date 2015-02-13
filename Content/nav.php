<!--
Menu avec tous les types de documents
-->
<div class="col-sm-3 col-md-2 sidebar">
    <div id="menu" class="navbar-collapse collapse">


        <ul class="nav nav-sidebar">
            <li><a href="index.php"><img src="Image/icon-home.png" width="15"/> Accueil</a></li>
            <li><a href="index.php?a=search"><img src="Image/icon-search.png" width="15"/> Rechercher Documents</a></li>
        </ul>
        <h3 class="sub-header">Documents 
            <?php
            if (in_array("1", $_SESSION['typeUs'])) {
                echo "<button type = \"button\" class = \"btn btn-primary\" data-toggle = \"modal\" data-target = \".bs-document-modal-lg\">+</button>";
            }
            ?>
        </h3>

        <ul class="nav nav-sidebar">
            <?php
            $typeds = TypeD::findAll();
            foreach ($typeds as $typed) {
                if ($typed->nomTypeD != "News") {
                    echo "<li><a href=";
                    echo "\"index.php?a=typed&idtyped=";
                    echo $typed->idTypeD;
                    echo "\"";
                    echo "><img src=\"Image/icon-documents.png\" width=\"15\"/> ";
                    echo $typed->nomTypeD;
                    echo "</a></li>";
                }
            }
            ?>
            <?php
            if (in_array("1", $_SESSION['typeUs'])) {
                echo "<center><button type = \"button\" class = \"btn btn-primary btn-sm\" data-toggle = \"modal\" data-target = \".bs-categorie-modal-lg\"><i>Ajouter une catégorie</i></button></center>";
                /*
                  echo "<div class=\"col-sm-2\">";
                  echo "</div>";
                  echo "<div class=\"col-sm-9\">";
                  echo "<button type = \"button\" class = \"btn btn-primary btn-block\" data-toggle = \"modal\" data-target = \".bs-example-modal-lg\"><i>Ajouter une catégorie</i></button>";
                  echo "</div>";
                  echo "<div class=\"col-sm-2\">";
                  echo "</div>";

                  echo "<div class=\"col-sm-1\">";
                  echo "</div>";
                  echo "<div class=\"col-sm-9\">";
                  echo "<button type = \"button\" class = \"btn btn-primary btn-block\" data-toggle = \"modal\" data-target = \".bs-example-modal-lg\"><i>Ajouter un document</i></button>";
                  echo "</div>";
                  echo "<div class=\"col-sm-2\">";
                  echo "</div>"; */
            }
            ?>
        </ul>
        <?php
        if (in_array("1", $_SESSION['typeUs'])) {
            echo "<h3 class=\"sub-header\">Employés</h3>";
            echo "<ul class=\"nav nav-sidebar\">";
            echo "<li><a href=\"index.php?a=coord\"><img src=\"Image/icon-details.png\" width=\"15\"/> Coordonnées Employés</a></li>";
            echo "<li><a href=\"index.php?a=adduser\"><img src=\"Image/icon-users.png\" width=\"15\"/> Comptes Utilisateurs</a></li>";
            echo "</ul>";
        }
        ?>
        <h3 class="sub-header">Portails</h3>
        <ul class="nav nav-sidebar">
            <li><a href="index.php?a=facebook"><img src="Image/icon-facebook.png" width="15"/> Facebook</a></li>
            <li><a href="index.php?a=siteweb"><img src="Image/icon-site.png" width="15"/> Site Web</a></li>
        </ul>
    </div>
</div>