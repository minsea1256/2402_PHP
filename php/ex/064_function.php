<?php
// function 함수정의(매개변수,파라미터 = 변수)
// echo 함수호출(아규먼트,인수 = 값);
function my_sum($num1, $num2){
    return $num1 + $num2;
}
echo my_sum(32, 54);

// 파라미터 default 설정 , 고정값으로 설정은 파라미터 뒤쪽으로 보내준다

/**
 * 두 숫자를 더한는 함수
 * 
 * @param int $num1 더할 첫번째 숫자
 * @param int $num2 더할 두번째 숫자, default 10
 * @return int 합계
 */
function my_sum2(int $num1, int $num2 = 10) {
    return $num1 + $num2;
}
echo my_sum2(5)."\n";

// -, *, /, %를 해주는 각가의 함수를 만들어 주세요.
function my_sub(int $num1, int $num2) {
    return $num1 - $num2;
}
function my_multi(int $num1, int $num2) {
    return $num1 * $num2;
}
function my_div(int $num1, int $num2) {
    return $num1 / $num2;
}
function my_remind(int $num1, int $num2) {
    return $num1 % $num2;
}
echo my_sub(2 , 5)."\n";
echo my_multi(2 , 5)."\n";
echo my_div(2 , 5)."\n";
echo my_remind(2 , 5);


$str = "처음 정의";
function test(string $str) {
    $str = "test()에서 변경";
}
function test2(string $str) {
    $str = "test()에서 변경";
    return $str;
}
// function 결과를 호출하는 방법
$str = test2($str);
echo $str;

// 가변 길이 파라미터(배열) : 받을 파라미터 개숫를 모를 경우 사용한다
function my_sum_all(...$numbers) {
    // $numbers = func_get_args(); php 5.5 이하일 경우 func_get_args()이용해서 가져올수 있다
    print_r($numbers);
}
my_sum_all(4,5,6,9,8,7,0);

// 파라미터로 받은 모든 수를 더하는 함수를 만들어 주세요.
function my_sum3(...$numbers) {
    $num_max = 0;//합계 값 저장 공간 , 2번

    // 파라미터 루프해서 값을 획득 후 더하기 , 3번
    foreach($numbers as $val) {
        $num_max += $val;
    }
    // 합계 리턴 , 4번
    return $num_max;
}
echo my_sum3(2, 5, 6); //1번

// 참조 전달 : function에 있는 데이터 값을 함수호출 할때 가져온다
function test_v($num) {
    $num = 3;
}
function test_r(&$num) {
    $num = 5;
}
$num = 0;
test_r($num);
echo $num;

// 참조 변수
$a =1;
$b = &$a;
$a = 3;

echo $b;