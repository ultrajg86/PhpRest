<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-21
 * Time: 오후 12:25
 */

namespace App\Model;

interface ModelImpl{

    public function fetch();
    public function fetchAll();
    public function create();
    public function delete();

}

?>