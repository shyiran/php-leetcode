<?php
class MinStack {
    /**
     * initialize your data structure here.
     */
    function __construct() {
        $this->min=9999999999;
        $this->stack=[];
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        if($this->min>$val) $this->min=$val;
        $this->stack[]=$val;
    }
  
    /**
     * @return NULL
     */
    function pop() {
        $min=array_pop($this->stack);
        if($this->min==$min){
            $min=9999999999;
            for($i=0;$i<count($this->stack);$i++){
                $min=min($min,$this->stack[$i]);
            }
            $this->min=$min;
        }
    }
  
    /**
     * @return Integer
     */
    function top() {
        return $this->stack[count($this->stack)-1];
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        return $this->min;
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
?>