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
