<?php

class BaseController {
    public $load;

    public function __construct() {
        $this->load = new Loader($this);
        print "<br>Init constructor<br>";
    }
    function __destruct() {
        print "<br>Destroying<br>";
        ConnectionManager::close();

    }

}