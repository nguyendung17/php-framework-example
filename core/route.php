<?php

$url =  $_SERVER['QUERY_STRING'];
$data = explode('/',$url);
if(count($data)>1){
    $controllerName = $data[1];
    $actionName = isset($data[2])?$data[2]:'';
    Loader::LoadController($controllerName,$actionName);

}