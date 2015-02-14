<!DOCTYPE html>
<html lang="fr">
    <?php
    include_once 'Content/head.html';
    ?>

    <body>

        <?php
        include_once 'Content/connecting_bar.php';
        ?>
        
        <div class="container-fluid">

            <div class="row">

                <?php
                include_once 'Content/nav.php';
                ?>

                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">  

                    
                    <div id="logoECTL">
                    </div>
                    

                    <br>

                    <!-- MODAL POUR L'AJOUT DE DOCUMENT -->
                    <div class="modal fade bs-document-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <?php
                                include_once 'Content/add_document.php';
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL POUR L'AJOUT DE NEWS -->
                    <div class="modal fade bs-news-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <?php
                                include_once 'Content/add_news.php';
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL POUR L'AJOUT DE CATÉGORIE -->
                    <div class="modal fade bs-categorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <?php
                                include_once 'Content/add_type.php';
                                ?>
                            </div>
                        </div>
                    </div>