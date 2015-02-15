<?php

include_once 'Model/Document.php';
include_once 'Model/TypeD.php';

class DocumentsView {

    function __construct() {
        
    }

    public function typedView($idTypeD) {
        include 'Content/header.php';
        $typed = TypeD::findById($idTypeD);
        echo "<h1 class=\"page-header\"><img src=\"Image/icon-documents.png\"/>" . $typed->nomTypeD . "<small> - " . $typed->descTypeD . "</small></h1>";
        $documents = Document::findByIdTypeD($idTypeD);
        $corbeille_id = TypeD::findByNom("Corbeille")->idTypeD;
        echo "<div class=\"row placeholders\"><br>";
        if ($idTypeD != $corbeille_id) {
            foreach ($documents as $document) {
                if (!in_array($corbeille_id, $document->idTypeDs())) {
                    Self::DocumentView($document);
                }
            }
        } else {
            foreach ($documents as $document) {
                Self::DocumentView($document);
            }
        }
        echo "</div>";
        include 'Content/footer.php';
    }

    public static function publicationsView() {
        $documents = Document::findAll();
        echo "<div class=\"table-responsive\">";
        echo "<table class=\"table table-striped table-hover\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>";
        echo "Date";
        echo "</th>";
        echo "<th>";
        echo "Heure";
        echo "</th>";
        echo "<th>";
        echo "Utilisateur";
        echo "</th>";
        echo "<th>";
        echo "Document/News";
        echo "</th>";
        echo "<th>";
        echo "Description/Contenu";
        echo "</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($documents as $document) {
            $publication = $document->findPublication();
            echo "<tr>";
            echo "<td>";  //date("d/m/Y", strtotime($singleNews->findPublication()["dateP"]))
            echo date("d/m/Y", strtotime($publication['dateP']));
            echo "</td>";
            echo "<td>";
            echo date("h:i:s", strtotime($publication['dateP']));
            echo "</td>";
            echo "<td>";
            echo Utilisateur::findById($publication['idU'])->nomU . " " . Utilisateur::findById($publication['idU'])->prenomU;
            ;
            echo "</td>";
            echo "<td>";
            $typed = $document->idTypeDs()[0];
            $news_id = TypeD::findByNom("News")->idTypeD;
            switch ($typed) {
                case $news_id:
                    echo $document->nomD;
                    break;
                default:
                    echo "<a class=\"view-pdf\" href=\"" . $document->urlD . "\" nom=\"" . $document->nomD . "\">" . $document->nomD . "</a>";
                    break;
            }
            echo "</td>";
            echo "<td>";
            $typed = $document->idTypeDs()[0];
            $news_id = TypeD::findByNom("News")->idTypeD;
            echo "<div style=\"font-size: 0.9em;\">";
            switch ($typed) {
                case $news_id:
                    echo $document->contenuD;
                    break;
                default:
                    echo $document->descD;
                    break;
            }
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }

    public static function SuppressionsView() {
        $corbeille_id = TypeD::findByNom("Corbeille")->idTypeD;
        $documents = Document::findByIdTypeD($corbeille_id);
        echo "<div class=\"table-responsive\">";
        echo "<table class=\"table table-striped table-hover\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>";
        echo "Date";
        echo "</th>";
        echo "<th>";
        echo "Heure";
        echo "</th>";
        echo "<th>";
        echo "Utilisateur";
        echo "</th>";
        echo "<th>";
        echo "Document/News";
        echo "</th>";
        echo "<th>";
        echo "Description/Contenu";
        echo "</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($documents as $document) {
            $suppression = $document->findSuppression();
            echo "<tr>";
            echo "<td>";  //date("d/m/Y", strtotime($singleNews->findPublication()["dateP"]))
            echo date("d/m/Y", strtotime($suppression['dateS']));
            echo "</td>";
            echo "<td>";
            echo date("h:i:s", strtotime($suppression['dateS']));
            echo "</td>";
            echo "<td>";
            echo Utilisateur::findById($suppression['idU'])->nomU . " " . Utilisateur::findById($suppression['idU'])->prenomU;
            ;
            echo "</td>";
            echo "<td>";
            $typed = $document->idTypeDs()[0];
            $news_id = TypeD::findByNom("News")->idTypeD;
            switch ($typed) {
                case $news_id:
                    echo $document->nomD;
                    break;
                default:
                    echo "<a class=\"view-pdf\" href=\"" . $document->urlD . "\" nom=\"" . $document->nomD . "\">" . $document->nomD . "</a>";
                    break;
            }
            echo "</td>";
            echo "<td>";
            $typed = $document->idTypeDs()[0];
            $news_id = TypeD::findByNom("News")->idTypeD;
            echo "<div style=\"font-size: 0.9em;\">";
            switch ($typed) {
                case $news_id:
                    echo $document->contenuD;
                    break;
                default:
                    echo $document->descD;
                    break;
            }
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }

    public function futurUsersView() {
        $inscriptions = Inscription::findAll();
        echo "<div class=\"table-responsive\">";
        echo "<table class=\"table table-hover\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>";
        echo "Code";
        echo "</th>";
        echo "<th>";
        echo "Validité";
        echo "</th>";
        echo "<th>";
        echo "Type d'Utilisateur";
        echo "</th>";
        echo "<th class=\"text-center\">";
        echo "<img src=\"Image/icon-delete.png\" width=\"25\"/>";
        echo "</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($inscriptions as $inscription) {
            echo "<tr>";
            echo "<td>";
            echo $inscription->codeI;
            echo "</td>";
            echo "<td>";
            echo $inscription->validiteI;
            echo "</td>";
            echo "<td>";
            echo TypeU::findById($inscription->idTypeU)->nomTypeU;
            echo "</td>";
            echo "<td class=\"text-center\">";
            echo "<form action=\"index.php\" method=\"GET\">";
            echo "<input type=\"hidden\" name=\"a\" value=\"deleteI\">";
            echo "<input type=\"hidden\" name=\"idI\" value=\"" . $inscription->idI . "\">";
            echo "<button type=\"submit\" class=\"btn btn-danger\">Supprimer</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    public static function documentView($document) {
        echo "<div id=\"document\" class=\"col-xs-6 col-sm-3 placeholder test\">";
        $news_id = TypeD::findByNom("News")->idTypeD;
        $oldnews = (in_array($news_id, $document->idTypeDs()));
        switch ($oldnews) {
            case true:
                echo "<h1 style=\"display:inline;\">";
                echo "<span class=\"glyphicon glyphicon-align-justify\" aria-hidden=\"true\">";
                echo "</span>";
                echo "</h1>";
                if (in_array("1", $_SESSION['typeUs'])) {
                    $typeCorbeille = TypeD::findByNom("Corbeille");
                    $corbeille_id = $typeCorbeille->idTypeD;
                    echo "<form style=\"margin-left:5px; margin-top: -15px; display:inline;\" action=\"index.php\" method=\"GET\">";
                    if (!in_array($corbeille_id, $document->idTypeDs())) {
                        echo "<input type=\"hidden\" name=\"a\" value=\"deleteD\">";
                        echo "<input type=\"hidden\" name=\"idC\" value=\"" . $corbeille_id . "\">";
                        echo "<input type=\"hidden\" name=\"idD\" value=\"" . $document->idD . "\">";
                        echo "<button type=\"submit\" class=\"btn btn-danger btn-xs\">Supprimer</button>";
                    } else {
                        echo "<input type=\"hidden\" name=\"a\" value=\"deleteDefinitlyD\">";
                        echo "<input type=\"hidden\" name=\"idD\" value=\"" . $document->idD . "\">";
                        echo "<button type=\"submit\" class=\"btn btn-danger btn-xs\">Détruire</button> ";
                        if (isset($_GET["idtyped"])) {
                            echo "<input type=\"hidden\" name=\"a\" value=\"restoreD\">";
                            echo "<input type=\"hidden\" name=\"idC\" value=\"" . $corbeille_id . "\">";
                            echo "<input type=\"hidden\" name=\"idD\" value=\"" . $document->idD . "\">";
                            echo "<button type=\"submit\" class=\"btn btn-success btn-xs\">Restaurer</button>";
                        }
                    }
                    echo "</form>";
                }
                //echo "<br><br>";
                echo "<h4>" . $document->nomD . "</h4>";
                echo "<div style=\"margin-bottom:5px;\" class=\"descDocument\"></div>";
                echo "<button onclick=\"displayModalNews(" . $document->idD . ")\" type=\"button\" class=\"btn btn-primary oldnews\" data-toggle=\"modal\" data-target=\".bs-news-modal-sm\">Afficher la news</button>";
                echo "<div style=\"display:none;\" class=\"contentNews" . $document->idD . "\">";
                echo "<div style=\"padding:15px;\">";
                echo "<h1 class=\"page-header\">" . $document->nomD . "</h1>";
                echo $document->contenuD;
                echo "</div>";
                echo "</div>";
                
                break;
            case false:
                echo "<a class=\"view-pdf\" href=\"" . $document->urlD . "\" nom=\"" . $document->nomD . "\">";
                echo "<h1 style=\"display:inline;\">";
                echo "<span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\">";
                echo "</span>";
                echo "</h1></a>";
                if (in_array("1", $_SESSION['typeUs'])) {
                    $typeCorbeille = TypeD::findByNom("Corbeille");
                    $corbeille_id = $typeCorbeille->idTypeD;
                    echo "<form style=\"margin-left:5px; margin-top: -15px; display:inline;\" action=\"index.php\" method=\"GET\">";
                    if (!in_array($corbeille_id, $document->idTypeDs())) {
                        echo "<input type=\"hidden\" name=\"a\" value=\"deleteD\">";
                        echo "<input type=\"hidden\" name=\"idC\" value=\"" . $corbeille_id . "\">";
                        echo "<input type=\"hidden\" name=\"idD\" value=\"" . $document->idD . "\">";
                        echo "<button type=\"submit\" class=\"btn btn-danger btn-xs\">Supprimer</button>";
                    } else {
                        echo "<input type=\"hidden\" name=\"a\" value=\"deleteDefinitlyD\">";
                        echo "<input type=\"hidden\" name=\"idD\" value=\"" . $document->idD . "\">";
                        echo "<button type=\"submit\" class=\"btn btn-danger btn-xs\">Détruire</button> ";
                        if (isset($_GET["idtyped"])) {
                            echo "<input type=\"hidden\" name=\"a\" value=\"restoreD\">";
                            echo "<input type=\"hidden\" name=\"idC\" value=\"" . $corbeille_id . "\">";
                            echo "<input type=\"hidden\" name=\"idD\" value=\"" . $document->idD . "\">";
                            echo "<button type=\"submit\" class=\"btn btn-success btn-xs\">Restaurer</button>";
                        }
                    }
                    echo "</form>";
                }
                echo "<a class=\"view-pdf\" href=\"" . $document->urlD . "\" nom=\"" . $document->nomD . "\"><h4>" . $document->nomD . "</h4></a>";
                echo "<div class=\"descDocument\"><p>" . $document->descD . "</p></div>";
                break;
        }
        echo "</div>";
    }

    public static function singleNewsView($singleNews) {
        echo "<div class=\"col-xs-24 col-sm-12 singleNews\">";
        echo "<div class=\"col-xs-4 col-sm-2\">";
        echo "<img src=\"Image/icon-attention.png\" width=\"25\"/><h4>" . date("d/m/Y", strtotime($singleNews->findPublication()["dateP"])) . "</h4>";
        echo "</div>";
        echo "<div class=\"col-xs-20 col-sm-10 left\">";
        echo "<h3 class=\"page-header\">" . $singleNews->nomD;
        if (in_array("1", $_SESSION['typeUs'])) {
            $typeCorbeille = TypeD::findByNom("Corbeille");
            $corbeille_id = $typeCorbeille->idTypeD;
            echo "<form style=\"display:inline; position: absolute; right: 0;\" action=\"index.php\" method=\"GET\">";
            echo "<input type=\"hidden\" name=\"a\" value=\"deleteD\">";
            echo "<input type=\"hidden\" name=\"idC\" value=\"" . $corbeille_id . "\">";
            echo "<input type=\"hidden\" name=\"idD\" value=\"" . $singleNews->idD . "\">";
            echo "<button type=\"submit\" class=\"btn btn-danger btn-xs\">Supprimer</button>";

            echo "</form>";
        }
        echo "</h3>";
        echo $singleNews->contenuD;
        echo "</div>";
        echo "</div>";
        echo "<div class=\"col-xs-24 col-sm-12 left\">";
        echo "<br>";
        echo "</div>";
    }

}
