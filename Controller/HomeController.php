<?php

include_once 'Controller.php';
include_once 'View/HomeView.php';

class HomeController extends Controller {

    public function __construct() {
        $this->tab_action = array(
            'default' => 'defaultAction',
            'home' => 'defaultAction',
        );
    }
    
    public function defaultAction() {
        $view = new HomeView();
        $view->defaultView();
    }
    
}