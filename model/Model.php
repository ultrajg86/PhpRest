<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-21
 * Time: 오후 12:25
 */

namespace App\Model;

class Model{

    protected $db;
    protected $logger;

    public function __construct($db, $logger){
        $this->db = $db;
        $this->logger = $logger;
    }

    public function __get($name){
        require_once MODEL_PATH . '/' . $name . '.php';
        return new $name($this->db, $this->logger);
    }

    public function __destruct(){
    }

}

?>