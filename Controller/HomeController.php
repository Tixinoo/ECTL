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
            'deleteD' => 'deleteDAction',
            'restoreD' => 'restoreDAction',
            'deleteDefinitlyD' => 'deleteDefinitlyDAction',
            'accountSettings' => 'accountSettingsAction',
            'recentActions' => 'recentActionsAction',
            'deleteU' => 'deleteUAction'
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

    public function accountSettingsAction() {
        $view = new HomeView();
        $view->accountSettingsView();
    }

    public function recentActionsAction() {
        $view = new HomeView();
        $view->recentActionsView();
    }
    
    public function deleteIAction() {
        if ($_GET["idI"]) {
            $inscription = Inscription::findById($_GET['idI']);
            $inscription->delete();
        }
        header("Location: index.php?a=adduser");
    }
    
    public function deleteUAction() {
        if ($_GET["idU"]) {
            $utilisateur = Utilisateur::findById($_GET['idU']);
            $utilisateur->actifU = false;
            $utilisateur->update();
        }
        header("Location: index.php?a=coord");
    } 

    public function deleteDAction() {
        if ((isset($_GET["idD"])) && (isset($_GET["idC"]))) {
            $document = Document::findById($_GET['idD']);
            $document->moveToTrash($_GET['idC']);
            $document->insertSuppression();
        }
        header("Location: index.php?a=typed&idtyped=" . $document->idTypeDs()[0]);
    }
    
    public function restoreDAction() {
        if ((isset($_GET["idD"])) && (isset($_GET["idC"]))) {
            $document = Document::findById($_GET['idD']);
            $document->restore($_GET['idC']);
            $document->deleteSuppression();
            $typeDs = $document->idTypeDs();
            if(in_array(TypeD::findByNom("News")->idTypeD, $typeDs)) {
                header("Location: index.php");
            } else {
                header("Location: index.php?a=typed&idtyped=" . $document->idTypeDs()[0]);
            }
        }
        //header("Location: index.php?a=typed&idtyped=" . $document->idTypeDs()[0]);
    }

    public function deleteDefinitlyDAction() {
        if ($_GET["idD"]) {
            $document = Document::findById($_GET['idD']);
            unlink($document->urlD);
            $document->deleteTypes();
            $document->deleteSuppression();
            $document->deletePublication();
            $document->delete();
        }
        header("Location: index.php");
    }

}
