<?php

class Tringle{
    private $a;
    private $b;
    private $c;
    private $angle;

    
    function __counstruct() {
        $this->a = 0;
        $this->b = 0;
        $this->c = 0;
        $this->angle = 0;
    }

    function setSides($firstSide, $secondSide, $angle) {
        $this->a = $firstSide;
        $this->b = $secondSide;
        $this->angle = $angle;
        $this->c = sqrt(pow($firstSide, 2) + pow($secondSide, 2) - ((2 * $firstSide * $secondSide) * cos($angle)));
    }

    function getArea() {
        return abs(0.5 * ($this->a * $this->b * sin($this->angle)));
    }

    function getA() {
        return $this->a;
    }
    
    function getB() {
        return $this->b;
    }

    function getC() {
        return $this->c;
    }

    function getAngle() {
        return $this->angle;
    }

    function setRandSides() {
        $this->a = rand(2, 15);
        $this->b = rand(2, 15);
        $this->angle = rand(10, 170);
        $this->c = sqrt(pow($this->a, 2) + pow($this->b, 2) - ((2 * $this->a * $this->b) * cos($this->angle)));
    }
}
?>