<?php

class BaseController {
    public $load;


    public function __construct() {
        $this->load = new Loader($this);
    }
    function __destruct() {
        ConnectionManager::close();

    }
    function index(){

    }

}