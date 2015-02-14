<div id="pageAccueil">
    <h1 class="page-header"><img src="Image/icon-home.png" width="35"/> Accueil<small> - Bienvenue dans votre espace !</small></h1>

    <h3 class="sub-header"><img src="Image/icon-news.png" width="50"/>News
        <?php
        if (in_array("1", $_SESSION['typeUs'])) {
            echo "<button type = \"button\" class = \"btn btn-primary btn-sm\" data-toggle = \"modal\" data-target = \".bs-news-modal-lg\">Ajouter une news</button>";
        }
        ?>
    </h3>
    <div id="news">
        <?php
        include_once 'View/DocumentsView.php';
        $idtypenews = TypeD::findByNom("News")->idTypeD;
        $news = Document::findByIdTypeD($idtypenews);
        $news = array_reverse($news);
        echo "<div class=\"row placeholders\"><br>";
        foreach ($news as $singleNews) {
            DocumentsView::singleNewsView($singleNews);
        }
        echo "</div>";
        ?>
    </div>

    <h3 class="sub-header"><img src="Image/icon-selection.png" width="50"/>Sélection de documents</h3>
    <div id="selectionDocuments">
        <center><img src="Image/icon-notyet.png" width="50"/><br>Disponible prochainement</center>
    </div>

    <br>

</div>