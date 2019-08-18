<?php

class Square
{
    private $a;


    function __counstruct() {
        $this->a = 0;
    }

    function setSide($side) {
        $this->a = $side;
    }

    function getArea() {
        return pow($this->a, 2);
    }

    function getA() {
        return $this->a;
    }
    
    function setRandSide() {
        $this->a = rand(2, 15);
    }
}

?>