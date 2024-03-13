<?php
// int : 숫자, 정수
$num = 123;
echo 123;
var_dump(123);

// double : 실수
var_dump(3.14123);

// string : 문자열 - '' 혹은 "" 문자열은 꼭 넣어준다
var_dump("abcd");
var_dump('wert');

// boolean : 논리
var_dump(true, false);

// NULL
var_dump(NULL);

// array : 배열
var_dump([1,2,3]);

// object : 객체
$obj = new DateTime();
var_dump($obj);

// 형변환 : 변수 앞에 (테이터타입) 변환
// 주의할점 : 문자를 숫자로 변환은 안된다 / 숫자를 숫자로 변환은 가능하다
var_dump((int)'123');
var_dump((string)456);
var_dump((int)"abc");
