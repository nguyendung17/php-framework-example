<?php
/**
 * Created by PhpStorm.
 * User: dungnv
 * Date: 11/1/17
 * Time: 1:29 PM
 */

class Loader
{
    public $parentClass;

    public function __construct($parentClass = null)
    {
        $this->parentClass = $parentClass;
    }

    public static function LoadController($controllerName,$actionName='')
    {
        require_once AppFolder."controllers/$controllerName.php";

        $x = new Loader($controllerName);
        if($actionName=='')$actionName = 'index';
        $controller = $x->loadClass($controllerName);
        $controller->$actionName();
    }
    public function view($viewName,$data = array()){
        $viewFilePath = AppFolder . "views/$viewName.php";
        extract($data);
        include($viewFilePath);
    }
    public function model($className)
    {
        require_once AppFolder . "models/$className.php";
        $this->parentClass->$className = $this->loadClass($className);
    }

    public function loadClass($className)
    {
        $refl = new ReflectionClass($className);
        return $refl->newInstanceArgs();
    }
}