<?php
class Whale {
    // 프로퍼티(Property)
    // class 중괄로안 멤버필드라고 한다
    // 접근 제어 지시자 => oop 정하는 지시자
    // public : class외부, 내부 어디에서 접근 가능
    public $str;
    // private : class 내부에서만 접근 가능, 외부는 접근 불가능
    private $i;
    // protected : class 내에서만 접근 가능, 외부에서 접근 불가능, 단, 상속관계에서 접근이 가능
    protected $boo;

    private $name;

    // 생성자 or 생성자 메소드
    // public function __construct() // 고정
    public function __construct($name) {
        $this->name = $name;
    }
                      
    // getter / setter : private이나 protected로 설정된 프로퍼티에 접근을 위해 사용하는 메소드
    // getter 메소드
    public function getName() {
        return $this->name;
    }
    // setter 메소드
    public function setName($name) {
        $this->name = $name;
    }

    // 메소드
    public function swim() {
        echo $this->name."헤엄 칩니다.\n";
    }
    public function breathe() {
        echo $this->name."호흡 한다.\n";
    }

    // static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드 / new Whale없이 바로 메모리에 저장이 되어 바로 사용할수 있다
    public static function big() {
        echo "매우 크다.\n";
    }

}

// Static 메소드 호출
Whale::big();

// 클래스 인스턴스 생성
$obj_whale = new Whale("고래"); //인스턴스 시작문구
// -> 문법으로 클래스 인스턴스 변수에서 클래스 에서 특정 메소드 혹은 프로퍼티 가져오고 싶을때 사용한다
$obj_whale->swim("횐 수염");//관습적으로 뛰어쓰기 안한다
echo $obj_whale->getName()."\n"; //캡슐화(데이터 보호) 때문에 내부에서만 접근할수 있는 데이터를 확인용
$obj_whale->breathe();

$obj_whale->setName("참새");
$obj_whale->swim("횐 수염");
$obj_whale->breathe();