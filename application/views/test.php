<?php
foreach($users as $user){
    $this->load->view('user',$user);
}