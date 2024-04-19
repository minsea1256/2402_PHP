console.log("Js파일에서 안녕하세요.");

// 호이스팅 회피하기 위해 변수선언을 위에 적용시킨다
// 선언시 주의할점 전역변수 인지 지역변수인지 확인 후 선언

// 변수
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
var num1 = 1; //최초 선언
var num1 = 2; //중복 선언
num1 = 3; // 재할당

// let으로 사용하는 것이 좋다
// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프 [**추천**]
let num2 = 2; //최초 선언
// let num2 = 3; 중복 선언
num2 = 5; //재할당

// 상수(관습적으로 대문자로 표기)
// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프 [**추천**]
const NUM = 3; //최초 선언
// const NUM = 4; 중복 선언
// NUM = 3; 재할당


// -----------------------------
// 스코프
// -----------------------------
// 변수나 함수가 유효한 범위
// 전역 레벨, 지역, 블록 크게 3가지 스코프로 구분

// 전역 스코프 : 어느 곳에서나 접근 가능
let globalScope = "전역 스코프";

function myPrint() {
    console.log(globalScope);
}
myPrint();
console.log(globalScope);

// 지역 스코프 : 함수안에서 사용가능한 함수 또는 변수
function myLocalPrint() {
    let localStr = "지역 스코프 let";
    console.log(localStr);
}
// console.log(localStr);

// 블록 레벨 스코프
// 중괄호{블럭} : 중괄호에 둘려싸인 범위를 의미한다
function myBlock() {
    if(true){
        var test1 = "var";
        let test2 = "let";
        const TEST3 = "const";
    }
    console.log(test1);
    console.log(test2);
    console.log(test3);
}

// 호이스팅(hoisting)
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
// var 호이스팅 문제
// console.log(test);
// test = "aaa";
// console.log(test);
// var test;
// let test;

// 데이터 타입
// number 숫자
let num = 1;

// string 문자열
let str = "abcde";

// boolean 논리(true/false)
let boo = true;

// null 존재하지 않는 값
let letNull = null;

// undefined 값이 할당 되어 있지 않은 상태
let letUndefined;

// object 객체
let obj = {
    key1: "val1",
    key2: "val2"
};

// Array 배열
let arr = [1, 2, 3];

// symbol 심볼 :
let letStr1 = "심볼1";
let letStr2 = "심볼1";

let letSymbol1 = Symbol("심볼1");
let letSymbol2 = Symbol("심볼1");

