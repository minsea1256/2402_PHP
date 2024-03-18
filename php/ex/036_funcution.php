<?php
// php 내장 함수 : 처음부터 있는 함수들
// trim(문자열) : 좌우의 공백 제거 함수, 문자 사이에는 공백은 제거 못한다
$str = "   홍길동 ";
echo trim($str);

// strtoupper(문자열) : 영어 대문자 출력
echo strtoupper("asdfg");
// strtolower(문자열) : 영어 소문자 출력
echo strtolower("ASDFG");
echo "\n";

// str_replace(대상문자열, 변경 문자열, 문자열) : 툭정 문자를 치환 해주는 함수 , 이어지는 문자열만 가능하다
echo str_replace("asd", "", "asdfg");
// 앞뒤로 치환 해주는 식
echo str_replace("asd", "", str_replace("g","","asdfg"));

// mb_substr(문자열, 시작위치, 출력할 개수) : 문자열을 시작위치에서 출력할 개수로 반환 해준다
// 음수는 오른쪽부터 생략과 시작위치 변경이 된다 > 음수는 잘 안 사용한다
$str = "홍길동갑순이";
echo mb_substr($str, 1, 4)."\n";
// 출력할 개수는 생략이 가능하다 그래서 시작위치 부터 다 출력한다
echo mb_substr($str, 2);

// mb_strpos(대상 문자열, 검색할 문자열) : 검색할 문자열이 있는 위치(int)가 반환
// 같은 문자가 있을때 맨 앞에있는 문자를 반환한다
$str = "나는 홍길동 입니다.";
echo mb_strpos($str, "홍")."\n";

// 특정단어 확인하는 코드
// false는 bool(블리언) 0으로 "나"는 int(인트) 0이므로 달라서 성립이 된다
if(mb_strpos($str, "나") !== false) {
    echo "포함됨";
}
else {
    echo "없어";
}

// sprintf(포맷문자열, 대입 문자열1, 대입 문자열2...)
// printf는 문자열을 완성시켜서 출력까지 해준다 그래서 잘 사용 안하다
$base_msg = "%s이/가 틀렸습니다.";
$print_msg = sprintf($base_msg, "아이디");
echo $print_msg."\n";

// isset(변수) : 변수의 설졍 여부 확인 true/false 리턴, 값이 있는지 없는지 확인용으로 많이 사용한다
$str1 = ""; //빈문자열 로 값이 있다
$str2 = NULL; //값이 없다
$str3 = 0;
$str4 = [];
var_dump(isset($str1),isset($str2),isset($str3),isset($str4));

// empty(변수) : 변수의 값이 비어있는지 확인, true/false 리턴, 사람의 시각으로 값을 출력해준다
var_dump('--',empty($str1),empty($str2),empty($str3),empty($str4));

// gettype(변수) : 데이터 타입을 문자열로 반환
$str1 = "abc";
$int1 = 5;
$arr = [];
$double1 = 1.4;
$boo = true;
$null = NULL;
$obj = new DateTime(); //객체 데이터 타입
var_dump(gettype($str1),gettype($int1),gettype($arr),gettype($double1),gettype($boo),gettype($null),gettype($obj));

$i = 3;
$i2 = (string)$i;
var_dump($i, $i2);
// settype(변수) : 변수의 데이터 형을 변환, 원본 변수 자체가 변경되므로 주의**
// 리턴값이 bool으로 값이 제대로 변경해는지 true/false 알려준다, 원본은 수정은 안 한다**
$i = 3;
$i2 = settype($i, "string");
var_dump($i, $i2);

// time() : 유닉스 타임스템프
// echo time()-86400; 하루전 날짜 획득

// date(포맷형식, 타임스탬프값) : 타임스탬프 값을 날짜 포맷형식으로 변환해서 반환
echo date("Y-m-d H:i:s", time()); //2000-01-01 13:50:06
//시간값에서 대문자H : 24시간, 소문자h : 12시간 형식으로 출력한다
// 윤달계산,월계산이(31일) 제대로 안된다 주의**

// ceil(숫자), round(숫자), floor(숫자)
var_dump(ceil(1.4), round(2.5), floor(1.9));

// random_int(시작값, 마지막값) : 시작값~마지막밧 범위의 랜덤한 숫자를 반환
echo random_int(1,10);