<?php
class hello extends BaseController {
    function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
    }
    function index(){
        $this->load->view("test", array('users'=>$this->UserModel->getAll()));
    }
}
