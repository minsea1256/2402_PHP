<?php
class Fish {
    protected $name;
    protected $residence;
    // 생성자
    public function __construct(string $name, string $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }
    final public function breath() {
        echo $this->name."는 아가미 호흡을 합니다.\n".$this->residence."에서 살고있습니다";
    }
    public function swimming() {
        echo $this->name."가 헤엄을 칩니다.\n".$this->residence."살고있습니다";
    }
}

class Saba extends Fish{
}

class FlyingFish extends Fish {
    // protected $name;
    // protected $residence;
    // // 생성자
    // public function __construct(string $name, string $residence) {
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }
    // final public function breath() {
    //     echo $this->name."는 아가미 호흡을 합니다.\n";
    // }
    // public function swimming() {
    //     echo $this->name."가 헤엄을 칩니다.\n";
    // }
    public function flying() {
        echo $this->name."가 날아갑니다.\n".$this->residence."살고있습니다";
    }
}

$WhaleInstance = new Saba("물고기","바다"); // 인스턴스화

$WhaleInstance->breath();
