<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-21
 * Time: 오전 10:39
 */

class NoticeService{

    private $db;
    private $logger;

    public function __construct($db, $logger){
        $this->db = $db;
        $this->logger = $logger;
    }

    public function __destruct(){
    }

    public function getLists(){

        $this->logger->info(__METHOD__, [func_get_args()]);

        $list = array();
        for($i=0; $i<10; $i++){
            $list[] = array(
                'no'=>$i,
                'title'=>'1111111' . rand(1, 999),
                'writer'=>'writer' . $i,
                'date'=>date('Y-m-d'),
                'count'=>rand(10, 100)
            );
        }

        return $list;
    }

    public function getView($idx = false){
        $this->logger->info(__METHOD__, [func_get_args()]);
    }

    public function isDelete($idx = false){
        $this->logger->info(__METHOD__, [func_get_args()]);
    }
}

?>