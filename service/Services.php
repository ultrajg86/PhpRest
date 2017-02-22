<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-21
 * Time: 오전 9:47
 */

namespace App\Service;

class Service{

    private $logger;

    public function __construct($logger){
        $this->logger = $logger;
    }

    public function __destruct(){
    }

    public function __autoload($class){
    }

    public function __invoke($var){
    }

    public function __get($name){
        return $this->load($name);
    }

    private function load($name){
        require_once SERVICE_PATH . '/' . $name . '.php';
        return new $name($this->logger);
    }

}

?>