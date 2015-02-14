<h1 class="sub-header">
    <img src="Image/icon-results.png" width="50"/>Paramètres du compte</h1>
<div id="parametresCompte">
    <br>
    <div class="col-sm-12">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            <div class="col-sm-12">
                <h3 class="page-header">
                    <?php
                    echo "<img src=\"" . $_SESSION['urlAvatarU'] . "\" height=\"80\"/> Votre compte";
                    ?>
                    <small> - Modifier vos informations</small>
                </h3>
            </div>
            <div class="col-sm-12">
                <form class="form-horizontal" action="Controller/updatinguser.php" method="POST">
                    <input name="idU" type="hidden" id="inputIdU" value=
                    <?php
                    echo "\"" . $_SESSION["idU"] . "\"";
                    ?>
                           >
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="inputPseudoU" class="col-sm-3 control-label">Identifiant</label>
                            <div class="col-sm-8">
                                <input name="pseudoU" type="text disabled" class="form-control" id="inputPseudoU" value=
                                <?php
                                echo "\"" . $_SESSION["pseudoU"] . "\"";
                                ?>
                                       >
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="inputEmailU" class="col-sm-3 control-label">Adresse email</label>
                        <div class="col-sm-8">
                            <input name="emailU" type="text" class="form-control" id="inputEmailU" value=
                            <?php
                            echo "\"" . $_SESSION["emailU"] . "\"";
                            ?>
                                   >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTelU" class="col-sm-3 control-label">Téléphone</label>
                        <div class="col-sm-8">
                            <input name="telU" type="text" class="form-control" id="inputTelU" value=
                            <?php
                            echo "\"" . $_SESSION["telU"] . "\"";
                            ?>
                                   >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUrlAvatarU" class="col-sm-3 control-label">Photo de profil (lien)</label>
                        <div class="col-sm-8">
                            <input name="urlAvatarU" type="text" class="form-control" id="inputUrlAvatarU" value=
                            <?php
                            echo "\"" . $_SESSION["urlAvatarU"] . "\"";
                            ?>
                                   >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-success btn-block">Modifier mes informations</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>