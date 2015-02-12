<div class="" style="padding: 10px;">
    <h3 class="sub-header"><img src="Image/icon-addtype.png" width="40"/> Ajouter une catégorie</h3>
    <br>
    <form action="Controller/addingtype.php" method="POST">
        <div class="form-group">
            <label for="inputNomTypeD">Titre</label>
            <input name="nomTypeD" type="text" class="form-control" id="inputNomTypeD" placeholder="Entrez le nome de la catégorie">
        </div>
        <div class="form-group">
            <label for="inputDescTypeD">Description</label>
            <input name="descTypeD" type="text" class="form-control" id="inputDescTypeD" placeholder="Décrivez la catégorie">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Ajouter la catégorie</button>
    </form>
</div>