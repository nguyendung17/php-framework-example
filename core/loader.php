<?php
/**
 * Created by PhpStorm.
 * User: dungnv
 * Date: 11/1/17
 * Time: 1:29 PM
 */

class Loader{
    public $parentClass;
    public function __construct($parentClass = null)
    {
//        print_r($object);
        $this->parentClass = $parentClass;
    }

    public function model($className){
        require_once "application/models/$className.php";
        $this->parentClass->$className = $this->loadClass($className);

    }
    public function loadClass($className){
        $refl = new ReflectionClass($className);
        return $refl->newInstanceArgs();
    }
}