

<div id="pageAccueil">
    <h1 class="page-header"><img src="Image/icon-home.png" width="35"/> Accueil<small> - Bienvenue dans votre espace !</small></h1>

    <h3 class="sub-header"><img src="Image/icon-news.png" width="50"/>News</h3>
    <div id="news">
        <?php
        include_once 'View/DocumentsView.php';
        $news = Document::findByIdTypeD(4);
        echo "<div class=\"row placeholders\"><br>";
        foreach ($news as $singleNews) {
            DocumentsView::singleNewsView($singleNews);
        }
        echo "</div>";
        ?>
    </div>

    <h3 class="sub-header"><img src="Image/icon-selection.png" width="50"/>Sélection de documents</h3>
    <div id="selectionDocuments">
    </div>

    <br>

</div>