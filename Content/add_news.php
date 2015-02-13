<div class="" style="padding: 10px;">
    <h3 class="sub-header"><img src="Image/icon-adddocument.png" width="40"/>Ajouter une news</h3>
    <br>
    <form action="Controller/addingnews.php" method="POST">
        <div class="form-group">
            <label for="inputNomD">Titre</label>
            <input name="nomD" type="text" class="form-control" id="inputNomD" placeholder="Entrez le titre de la news">
        </div>
        <div class="form-group">
            <label for="inputDescD">Contenu</label>
            <textarea name="contenuD" class="form-control" id="inputDescD" placeholder="Contenu de la news"></textarea>
        </div>
        <div class="form-group">
            <label for="inputIdTypeD">Type</label><br>
            <?php
            $typeds = TypeD::findAll();
            foreach ($typeds as $typed) {
                if ($typed->nomTypeD == "News") {
                    echo "<div class=\"radio\">";
                    echo "<label>";
                    echo "<input type=\"radio\" name=\"idTypeD\" id=idTypeD\"";
                    echo $typed->idTypeD;
                    echo "\" value=\"";
                    echo $typed->idTypeD;
                    echo "\">";
                    echo $typed->nomTypeD;
                    echo "</label>";
                    echo "</div>";
                }
            }
            ?>
        </div>
        <br>
        <button type="submit" class="btn btn-access btn-block">Ajouter la news</button>
    </form>
</div>