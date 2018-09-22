<?php

class BaseData {

    protected $mainarray = [];
    protected $xml;
 

    function __construct($class) {
        $this->class = $class;
        $this->xml = simplexml_load_file("xml/" . $class . ".xml");
        $this->mainarray = (array) $this->xml;

    }
        protected $class;


    function getArray() {
        return $this->mainarray;
    }

    function addArray($str, $item) {

        $this->mainarray[$str] = $item;
    }


}
