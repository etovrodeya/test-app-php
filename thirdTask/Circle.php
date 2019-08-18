<?php

class Circle
{
    private $r;

    
    function __counstruct() {
        $this->r = 0;
    }

    function setRadius($radius) {
        $this->r = $radius;
    }

    function getArea() {
        return 3.14 * pow($this->r, 2);
    }

    function getR() {
        return $this->r;
    }
    
    function setRandRadius() {
        $this->r = rand(2, 15);
    }
}

?>