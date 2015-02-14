<h1 class="page-header"><img src="Image/icon-users.png" width="35"/> Comptes Utilisateurs<small> - Ajouter de nouveaux utilisateurs</small></h1>

<br>

<div class="col-sm-12">
    <div class="col-sm-5">
        <div class="col-sm-12">
            <h3 class="page-header"><img src="Image/icon-adduser.png" width="20"/>  Ajouter<small> - Permettre une inscription</small></h3>
        </div>
        <div class="col-sm-12">
            <form class="form-horizontal" action="Controller/addinguser.php" method="POST">
                <div class="form-group">
                    <label for="inputCodeI" class="col-sm-4 control-label">Nouveau Code</label>
                    <div class="col-sm-8">
                        <input name="codeI" type="text" class="form-control" id="inputCodeI" placeholder="Code d'inscription">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputValiditeI" class="col-sm-4 control-label">Valide jusqu'au</label>
                    <div class="col-sm-8">
                        <input name="validiteI" type="date" class="form-control datepicker" id="inputValiditeI">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTypeU" class="col-sm-4 control-label">Type de l'utilisateur</label>
                    <div class="col-sm-8">
                    <?php
                    $typeUs = TypeU::findAll();
                    foreach ($typeUs as $typeU) {
                        if ($typeU->nomTypeU != "News") {
                            echo "<div class=\"radio\">";
                            echo "<label>";
                            echo "<input type=\"radio\" name=\"idTypeU\" id=idTypeU\"";
                            echo $typeU->idTypeU;
                            echo "\" value=\"";
                            echo $typeU->idTypeU;
                            echo "\">";
                            echo $typeU->nomTypeU;
                            echo "</label>";
                            echo "</div>";
                        }
                    }
                    ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-success btn-block">Ajouter un nouveau code</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="col-sm-7">
        <div class="col-sm-12">
            <h3 class="page-header"><img src="Image/icon-futurusers.png" width="20"/>  Futurs inscrits<small> - Inscriptions à venir</small></h3>
        </div>
        <div class="col-sm-12">
            <?php
            include_once 'View/UtilisateursView.php';
            UtilisateursView::futurUsersView();
            ?>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="col-sm-5">
    </div>

    <div class="col-sm-7">
        <div class="col-sm-12">
            <h3 class="page-header"><img src="Image/icon-recentusers.png" width="20"/>  Récents inscrits<small> - Nouveaux utilisateurs</small></h3>
        </div>
        <div class="col-sm-12">
            <center><img src="Image/icon-notyet.png" width="50"/><br>Disponible prochainement</center>
            <!-- PAS ENCORE IMPLÉMENTÉE
            <?php
            include_once 'View/UtilisateursView.php';
            UtilisateursView::futurUsersView();
            ?>
            -->
        </div>
    </div>
</div>