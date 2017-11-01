<?php
class hello extends BaseController {
    function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
        echo '<pre>';
        print_r( $this->UserModel->getAll());
    }
    function index(){

    }
}
