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
    <br>
    <br>
    <a href="http://facebook.com/tractlux" target="_blank">Facebook</a>
    <br>
    <a href="http://tractlux.com/" target="_blank">Retour au site</a>
    <br>
</div>