<?php

class Loader {

    protected $model;
    protected $data;
    protected $tpl = [];

    protected function getTemplate($model) {

        if (file_exists($model)) {
            $this->data = file_get_contents($model);
        }
    }

    protected function assignData($temp,$service) {
        $this->getTemplate('template/' . $temp . '.html');
        require_once 'data/BaseData.php';
        $tempdata = new BaseData($temp,$service);
        if (!empty($tempdata->getArray())) {
            foreach ($tempdata->getArray() as $key => $value) {
                $this->tpl[$key] = $value;
            }
        }
    }

    protected function showData($data,$service=null) {
        $this->assignData($data,$service);
        if (count($this->tpl) > 0) {
            foreach ($this->tpl as $key => $value) {
                $this->data = str_replace('{' . $key . '}', $value, $this->data);
  
                
            }
            eval("?>$this->data <?php");
        }
    }

}
