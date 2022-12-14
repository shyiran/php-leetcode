<?php
class OrderedStream {
    /**
     * @param Integer $n
     */
    function __construct($n) {
        $this->arr=[];
        $this->index=1;
    }
  
    /**
     * @param Integer $idKey
     * @param String $value
     * @return String[]
     */
    function insert($idKey, $value) {
        $ans=[];
        $this->arr[$idKey]=$value;
        while(isset($this->arr[$this->index])){
            $ans[]=$this->arr[$this->index++];
        }
        return $ans;
    }
}

/**
 * Your OrderedStream object will be instantiated and called as such:
 * $obj = OrderedStream($n);
 * $ret_1 = $obj->insert($idKey, $value);
 */
?>