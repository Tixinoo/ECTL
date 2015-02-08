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
            'coord' => 'coordAction'
        );
    }

    public function defaultAction() {
        $view = new HomeView();
        $view->defaultView();
    }

    public function searchAction() {
        $view = new HomeView();
        $view->searchView($_GET["keywords"]);
    }
    
    public function typedAction() {
        $view = new DocumentsView();
        $view->typedView($_GET["idtyped"]);
    }
    
    public function coordAction() {
        $view = new UtilisateursView();
        $view->coordView();
    }

}
