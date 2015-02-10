<!--
Menu avec tous les types de documents
-->

<div id="menu">

    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?a=search">Rechercher Documents</a></li>
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
                echo ">";
                echo $typed->nomTypeD;
                echo "</a></li>";
            }
            ?>
        </ul>
        <h3 class="sub-header">Employés</h3>
        <ul class="nav nav-sidebar">
            <?php
            if (in_array("1", $_SESSION['typeUs'])) {
                echo "<li><a href=\"index.php?a=coord\">Coordonnées Employés</a></li>";
                echo "<li><a href=\"\">Comptes Utilisateurs</a></li>";
            }
            ?>
        </ul>
        <h3 class="sub-header">Site</h3>
        <ul class="nav nav-sidebar">
            <li><a href="index.php?a=facebook">Facebook</a></li>
            <li><a href="http://tractlux.com/" target="_blank">Retour au site</a></li>
        </ul>
    </div>
</div>