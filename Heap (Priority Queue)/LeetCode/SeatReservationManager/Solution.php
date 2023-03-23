<?php 

class SeatManager {

    private $heap;

    /**
     * @param Integer $n
     */
    function __construct($n) {
        
        $this->heap = new SplMinHeap();

        $this->initSeats($n);
    }

    function initSeats($n) {

        for ($i = 1; $i <= $n; $i++) {
            $this->heap->insert($i);
        }
    }
  
    /**
     * @return Integer
     */
    function reserve() {
        return $this->heap->extract();
    }
  
    /**
     * @param Integer $seatNumber
     * @return NULL
     */
    function unreserve($seatNumber) {
        $this->heap->insert($seatNumber);
    }
}

/**
 * Your SeatManager object will be instantiated and called as such:
 * $obj = SeatManager($n);
 * $ret_1 = $obj->reserve();
 * $obj->unreserve($seatNumber);
 */
