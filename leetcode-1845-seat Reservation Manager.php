class SeatManager {
    /**
     * @param Integer $n
     */
    function __construct($n) {
        $this->nums=[];
        $this->now=0;
    }
  
    /**
     * @return Integer
     */
    function reserve() {
        $now=&$this->now;
        $nums=&$this->nums;
        $seat=null;
        if(count($nums)==0){
            $now++;
            $seat=$now;
        }
        else{
            $seat=min($nums);
            unset($nums[$seat]);
        }
        
        
        return $seat;
    }
  
    /**
     * @param Integer $seatNumber
     * @return NULL
     */
    function unreserve($seatNumber) {
        $nums=&$this->nums;
        $nums[$seatNumber]=$seatNumber;
    }
}

/**
 * Your SeatManager object will be instantiated and called as such:
 * $obj = SeatManager($n);
 * $ret_1 = $obj->reserve();
 * $obj->unreserve($seatNumber);
 */