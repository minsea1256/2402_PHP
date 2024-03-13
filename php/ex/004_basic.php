<?php
// 변수(Variable) : 쉽게 이해하면 그릇인데 무언가를 담을수 있는 그릇
// = : 답을 변수에 적용하는 뜻
$str = "안녕 php";
echo $str;

// 한글로 작성시 작동은 하나 언제 버그 터질지 모른다 그러므로 한글로 사용 금지
$숫자1 = 1;
echo $숫자1;
// '_'로 단어와 단어 사이를 구분한다
$user_name;

// 대문자와 소문자는 다른게 본다
$Num = 1;
$num = 1;
echo $Num,$num;

// 네이밍 기법
// 스네이크 기법 - 퓨어php 작업하면 스네이크로 작업한다
$user_name;

// 카멜 기법 - 계체지항적으로 작업하면 카멜로 작업한다 
$serName;

echo "\n";
// 상수 : 절대 변하지 않는 값 / 숫자열과 문자열 적용이 된다
// 상수명은 대문자 / 단어와 단어사이는 '_' 사용한다
// define("USER_AGE", "가나다라");

define("USER_AGE", 30); //이미 선언된 상수이므로 워닝 일어나고 값이 바뀌지 않음

// echo USER_AGE;
// Warning : 오류는 아니고 정상 실행은 한다 그러므로 주의!!

// 점심메뉴
// 탕수육 9000원
// 햄버거 10000원
// 빵 2000원

$menu = "점심메뉴\n";
$tang = "탕수육 9000원\n";
$hamberger = "햄버거 10000원\n";
$bang = "빵 2000원";
echo $menu, $tang, $hamberger, $bang;

echo "\n";
// 스왑 : 서로변수를 변경할수 있다
// $tmp : 임시변수로 정할수 있다
$swap1 = "곤드레밥";
$swap2 = "자짱면";
$tmp = "";

$tmp = $swap1;
$swap1 = $swap2;
$swap2 = $tmp;

echo $swap1;
echo $swap2;