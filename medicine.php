<?php 
class med{
    public function __construct($brandname,$genericname,$type,$price, $qty){
        $this->$brandname = $brandname;
        $this->$genericname = $genericname;
        $this->$type = $type;
        $this->price = $price;
        $this->qty = $qty;
    }
}
?>