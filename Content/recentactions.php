<h1 class="sub-header"><img src="Image/icon-action.png" width="45"/> Historiques des Actions</h1>
<div id="actionsRecentes">

    <div class="col-sm-12">
        <div id="publicationsRecentes">
            <h3 class="sub-header"><img src="Image/icon-adddocument.png" width="40"/>Publications</h3>
            <?php
            include_once 'View/DocumentsView.php';
            DocumentsView::publicationsView();
            ?>  
        </div>

        <div id="suppressionsRecentes">
            <h3 class="sub-header"><img src="Image/icon-delete.png" width="40"/>Suppressions</h3>
            <?php
            include_once 'View/UtilisateursView.php';
            UtilisateursView::futurUsersView();
            ?>  
        </div>
    </div>

</div>