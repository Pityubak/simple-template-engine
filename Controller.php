<?php

require 'Loader.php';

class Controller extends Loader {

    public function _construct($view, $model = null) {
        parent::__construct($view, $model);

    }

    public function changeView($type, $param) {
        switch (filter_input($type, $param)) {
            case "Back":
                $this->showData('index');
                break;
            case "Next":
                $this->showData("examplepage");
                break;
            default :
                $this->showData('index');
                break;
        }
    }

}
