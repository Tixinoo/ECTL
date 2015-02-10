<?php

include_once 'Controller.php';
include_once 'View/HomeView.php';
include_once 'View/DocumentsView.php';
include_once 'View/UtilisateursView.php';

class HomeController extends Controller {

    public function __construct() {
        $this->tab_action = array(
            'default' => 'defaultAction',
            'home' => 'defaultAction',
            'typed' => 'typedAction',
            'search' => 'searchAction',
            'coord' => 'coordAction',
            'facebook' => 'facebookAction',
            'siteweb' => 'sitewebAction'
        );
    }

    public function defaultAction() {
        $view = new HomeView();
        $view->defaultView();
    }

    public function searchAction() {
        $view = new HomeView();
        $kw = "";
        if(isset($_GET["keywords"])) {
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

}
