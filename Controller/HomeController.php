<?php

include_once 'Controller.php';
include_once 'View/HomeView.php';
include_once 'View/DocumentsView.php';
include_once 'View/UtilisateursView.php';
include_once 'Model/Inscription.php';

class HomeController extends Controller {

    public function __construct() {
        $this->tab_action = array(
            'default' => 'defaultAction',
            'home' => 'defaultAction',
            'typed' => 'typedAction',
            'search' => 'searchAction',
            'coord' => 'coordAction',
            'facebook' => 'facebookAction',
            'siteweb' => 'sitewebAction',
            'adduser' => 'adduserAction',
            'deleteI' => 'deleteIAction',
            'deleteD' => 'deleteDAction'
        );
    }

    public function defaultAction() {
        $view = new HomeView();
        $view->defaultView();
    }

    public function searchAction() {
        $view = new HomeView();
        $kw = "";
        if (isset($_GET["keywords"])) {
            $kw = $_GET["keywords"];
        }
        $view->searchView($kw);
    }

    public function typedAction() {
        $view = new DocumentsView();
        $view->typedView($_GET["idtyped"]);
    }

    public function coordAction() {
        $view = new UtilisateursView();
        $view->coordView();
    }

    public function facebookAction() {
        $view = new HomeView();
        $view->facebookView();
    }

    public function sitewebAction() {
        $view = new HomeView();
        $view->sitewebView();
    }

    public function adduserAction() {
        $view = new UtilisateursView();
        $view->adduserView();
    }

    public function deleteIAction() {
        if ($_GET["idI"]) {
            $inscription = Inscription::findById($_GET['idI']);
            $inscription->delete();
        }
        header("Location: index.php?a=adduser");
    }

    public function deleteDAction() {
        if ($_GET["idD"]) {
            $document = Document::findById($_GET['idD']);
            $document->moveToTrash();
        }
        header("Location: index.php?a=typed&idtyped=" . $document->idTypeDs()[0]);
    }
    
    public function deleteDefinitlyDAction() {
        if ($_GET["idD"]) {
            $document = Document::findById($_GET['idD']);
            $document->deleteTypes();
            $document->deletePublication();
            $document->deleteSuppression();
            $document->delete();
        }
        header("Location: index.php");
    }

}
