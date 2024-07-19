<?php

namespace mammal;

abstract class Mammal {
    protected string $name; //이름

    public function __construct($name) {
        $this->name = $name;
    }

    //  추상메소드는 ()여기서 끝난다.
    abstract public function printRegidence();

}