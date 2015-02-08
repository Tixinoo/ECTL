<!--
Menu avec tous les types de documents
-->

<div id="menu">
    <h4>Menu</h4>
    <a href="index.php" >Accueil ECTL</a>
    <nav>
        <?php
        $typeds = TypeD::findAll();
        foreach ($typeds as $typed) {
            echo "<a href=";
            echo "\"index.php?a=typed&idtyped=";
            echo $typed->idTypeD;
            echo "\"";
            echo ">";
            echo $typed->nomTypeD;
            echo "</a><br>";
        }
        ?>
    </nav>
    <?php
    if(in_array("1", $_SESSION['usertypes'])) {
        echo "<br>";
        echo "<a href=\"\">Coordonnées Conducteurs</a>";
        echo "<br>";
        echo "<a href=\"\">Comptes Utilisateurs</a>";
    }
    ?>
    <br>
    <br>
    <a href="http://facebook.com/tractlux" target="_blank">Facebook</a>
    <br>
    <a href="http://tractlux.com/" target="_blank">Retour au site</a>
    <br>
</div>