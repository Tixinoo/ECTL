<div class="" style="padding: 10px;">
    <h3 class="sub-header"><img src="Image/icon-adddocument.png" width="40"/>Ajouter un document</h3>
    <br>
    <form action="Controller/addingdocument.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputNomD">Titre</label>
            <input name="nomD" type="text" class="form-control" id="inputNomD" placeholder="Entrez le titre du document">
        </div>
        <div class="form-group">
            <label for="inputDescD">Description</label>
            <input name="descD" type="text" class="form-control" id="inputDescD" placeholder="Décrivez le document">
        </div>
        <div class="form-group">
            <label for="inputDescD">Contenu</label>
            <textarea name="contenuD" class="form-control" id="inputDescD" placeholder="Copiez/collez le contenu du document"></textarea>
        </div>
        <div class="form-group">
            <label for="inputFileD">Fichier</label>
            <input name="inputFileD" type="file" id="inputFileD">
            <p class="help-block">Veuillez envoyer un fichier au format PDF.</p>
        </div>
        <div class="form-group">
            <label for="inputIdTypeD">Type</label><br>
            <?php
            $typeds = TypeD::findAll();
            foreach ($typeds as $typed) {
                if ($typed->nomTypeD != "News") {
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
        <button type="submit" class="btn btn-primary btn-block">Ajouter le document</button>
    </form>
</div>