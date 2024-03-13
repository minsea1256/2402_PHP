<?php
// 연결 연산자 : '.' / 연결 연산자 이용할때 숫자는 문자열로 나와서 숫자열로 변경해줘야 한다
$str1 = "안녕, ";
$str2 = "PHP!!";
$num = 1111;
echo $str1.$str2.(string)$num;

// 출력 : "안녕, 하세요!~"
$str1 = "안녕";
$str2 = "하세요";
echo $str1.",".$str2."!~";
$tmp1 = ",";
$tmp2 = "!~";
echo $str1.$tmp1.$str2.$tmp2;
