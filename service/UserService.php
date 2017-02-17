<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-17
 * Time: 오후 4:32
 */

class UserService{

    public function __construct(){
        echo __METHOD__;
    }

    public function getUserInfo(){

        var_dump($this->app);

        return array(
            'user_id' => 'ultrajg86'
        );
    }

    public function __destruct(){
        echo __METHOD__;
    }

}