<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-21
 * Time: 오전 10:39
 */

class NoticeService{

    private $logger;

    public function __construct($logger){
        $this->logger = $logger;
    }

    public function __destruct(){
    }

    public function getLists(){

        $this->logger->info(__METHOD__, [func_get_args()]);

        $list = array();

        $thumbnail = '/uploads/' . date('Y') . '/' . date('m') . '/';
        $folderPath = DOCUMENT_ROOT . $thumbnail;


        $fileRead = opendir($folderPath);
        while(($file = readdir($fileRead)) !== false){
            if(strpos($file, '_b')){
                $list[] = array(
                    'no'=>rand(1, 10),
                    'title'=>$file,
                    'writer'=>'writer',
                    'thumbnail'=>$thumbnail . $file,
                    'date'=>date('Y-m-d'),
                    'count'=>rand(10, 100)
                );
            }
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