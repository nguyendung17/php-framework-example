<?php

$url =  $_SERVER['QUERY_STRING'];
$data = explode('/',$url);
if(count($data)>2){
    $controllerName = $data[1];
    $actionName = $data[2];
    require_once "application/controllers/$controllerName.php";
    $x = new Loader();
    $x->loadClass($controllerName);
}