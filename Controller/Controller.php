<?php

abstract class Controller {
    
    public  $tab_action;

    public function callAction($get) {
        if ($get!="default") {
            $f = $this->tab_action[$get['a']];
            $this->$f($get);
        }
        else
            $this->defaultAction();
    }
}