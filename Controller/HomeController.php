<?php

include_once 'Controller.php';
include_once 'View/HomeView.php';
include_once 'View/DocumentsView.php';

class HomeController extends Controller {

    public function __construct() {
        $this->tab_action = array(
            'default' => 'defaultAction',
            'home' => 'defaultAction',
            'typed' => 'typedAction',
            'search' => 'searchAction'
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

}
