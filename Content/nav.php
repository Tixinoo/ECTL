<!--
Menu avec tous les types de documents
-->

<div id="menu">

    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li><a href="index.php"><img src="Image/icon-home.png" width="15"/> Accueil</a></li>
            <li><a href="index.php?a=search"><img src="Image/icon-search.png" width="15"/> Rechercher Documents</a></li>
        </ul>
        <h3 class="sub-header">Documents</h3>
        <ul class="nav nav-sidebar">
            <?php
            $typeds = TypeD::findAll();
            foreach ($typeds as $typed) {
                echo "<li><a href=";
                echo "\"index.php?a=typed&idtyped=";
                echo $typed->idTypeD;
                echo "\"";
                echo "><img src=\"Image/icon-documents.png\" width=\"15\"/> ";
                echo $typed->nomTypeD;
                echo "</a></li>";
            }
            ?>
        </ul>
        <?php
        if (in_array("1", $_SESSION['typeUs'])) {
            echo "<h3 class=\"sub-header\">Employés</h3>";
            echo "<ul class=\"nav nav-sidebar\">";
            echo "<li><a href=\"index.php?a=coord\"><img src=\"Image/icon-details.png\" width=\"15\"/> Coordonnées Employés</a></li>";
            echo "<li><a href=\"\"><img src=\"Image/icon-users.png\" width=\"15\"/> Comptes Utilisateurs</a></li>";
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