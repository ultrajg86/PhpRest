<?php

class Pagination{

    private $pageUrl;
    private $currentPage;
    private $totalCount;
    private $showCount;
    private $blockCount;
    private $startPage;
    private $endPage;
    private $totalPage;
    
    //Tag
    private $openWarper = '';    //전체감싸기
    private $endWarper = '';
    private $openTag = '';       //a 태그 감싸기
    private $endTag = '';
    private $openCurrentTag = '';    //현재 페이지 감싸기
    private $endCurrentTag = '';
    
    public function __construct($currentPage = 1){
        $this->pageUrl = $_SERVER['PHP_SELF'];
        $this->currentPage = $currentPage;
        $this->totalCount = 0;
        $this->showCount = 10;
        $this->blockCount = 10;
        $this->startPage = $this->endPage = $this->totalPage = 0;
		$this->openWarper = $this->endWarper = ' ';
		$this->openTag = '[ ';
		$this->endTag = ' ]';
		$this->openCurrentTag = '<strong>[ ';
		$this->endCurrentTag = ' ]</strong>';
        //$this->openWarper = $this->endWarper = $this->openTag = $this->endTag = $this->openCurrentTag = $this->endCurrentTag = ' ';
    }

    public function showPagination($rgParams = array()){
        $paramsQuery = '';
        foreach ($rgParams as $key=>$value){
            if($key == 'page'){
                continue;
            }
            $paramsQuery .= '&' . $key . '=' . $value;
        }

        $rgPagination = array();
        if($this->totalCount > 0){
            $this->totalPage = (int) ceil($this->totalCount / $this->showCount);
            $this->startPage = (int) ((floor(($this->currentPage - 0.95) / $this->blockCount) * $this->blockCount)) + 1;
            $this->endPage = $this->startPage + $this->blockCount - 1;
            $this->endPage = ($this->endPage > $this->totalPage) ? $this->totalPage : $this->endPage;

            if($this->currentPage !== 1){
                $rgPagination[] = $this->openTag . "<a href='" . $this->pageUrl . "?page=1" . $paramsQuery . "'>&laquo;</a>" . $this->endTag;
            }
            if($this->startPage !== 1){
                $rgPagination[] = $this->openTag . "<a href='" . $this->pageUrl . "?page=" . ($this->currentPage - 1) . $paramsQuery . "'>◀</a>" . $this->endTag;
            }

            for($i=$this->startPage; $i<=$this->endPage; $i++){
                if($i === $this->currentPage){
                    $rgPagination[] = $this->openCurrentTag . "<a>" . $i . "</a>" . $this->endCurrentTag;
                }else{
                    $rgPagination[] = $this->openTag . "<a href='" . $this->pageUrl . "?page=" . $i . $paramsQuery . "'>" . $i . "</a>" . $this->endTag;
                }
            }

            if($this->endPage < $this->totalPage){
                $rgPagination[] = $this->openTag . "<a href='" . $this->pageUrl . "?page=" . ($this->currentPage + 1) . $paramsQuery . "'>▶</a>" . $this->endTag;
            }
            if($this->totalPage !== $this->currentPage){
                $rgPagination[] = $this->openTag . "<a href='" . $this->pageUrl . "?page=" . $this->totalPage . $paramsQuery . "'>&raquo;</a>" . $this->endTag;
            }

        }
        return $this->openWarper . implode('', $rgPagination) . $this->endWarper;
    }

    public function setWarper($warper){
        $warper = str_replace('<', '', $warper);
        $warper = str_replace('>', '', $warper);
        $this->openWarper = '<' . $warper . '>';
        if(strpos($warper, ' ') > 0){
            $this->endWarper = '</' . substr(0, strpos($warper, ' ')) . '>';
        }else{
            $this->endWarper = '</' . $warper . '>';
        }
    }

    public function setTag($tag){
        $tag = str_replace('<', '', $tag);
        $tag = str_replace('>', '', $tag);
        $this->openTag = '<' . $tag . '>';
        if(strpos($tag, ' ') > 0){
            $this->endTag = '</' . substr($tag, 0, strpos($tag, ' ')) . '>';
        }else{
            $this->endTag = '</' . $tag . '>';
        }

        if(empty($this->openCurrentTag) || empty($this->endCurrentTag)){
            $this->openCurrentTag = $this->openTag;
            $this->endCurrentTag = $this->endTag;
        }
    }

    public function setCurrentTag($tag){
        $tag = str_replace('<', '', $tag);
        $tag = str_replace('>', '', $tag);
        $this->openCurrentTag = '<' . $tag . '>';
        if(strpos($tag, ' ') > 0){
            $this->endCurrentTag = '</' . substr($tag, 0, strpos($tag, ' ')) . '>';
        }else{
            $this->endCurrentTag = '</' . $tag . '>';
        }
    }

    public function getNoStart(){
        return ($this->totalCount - ($this->showCount * ($this->currentPage - 1)));
    }

    public function getNo($i){
        return $this->getNoStart() - $i;
    }

    //sql query
    public function getLimit(){
        $limit =  ((int)($this->currentPage - 0.95)) * $this->showCount . ', ' . $this->showCount;
        return " LIMIT " . $limit;
    }

    //getter , setter
    public function setPageUrl($pageUrl){$this->pageUrl = $pageUrl;}
    public function setCurrentPage($currentPage){$this->currentPage = $currentPage;}
    public function setTotalCount($totalCount){$this->totalCount = $totalCount;}
    public function setShowCount($showCount){$this->showCount = $showCount;}
    public function setBlockCount($blockCount){$this->blockCount = $blockCount;}

}

?>
