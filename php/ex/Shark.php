<?php
namespace php\ex;

class Shark {
    private $name; //private : Class안에서 사용할수 있다
    // 생성자 처리
    public function __construct($name) {
        $this->name = $name;
    }
    // 메소드
    public function swim() {
        echo $this->name."헤엄 칩니다.\n";
    }
    public function breathe() {
        echo $this->name."호홉한다.\n";
    }
}
// 인스턴스 생성
$objShark = new Shark("상어");
$objShark->swim();
$objShark->breathe();
