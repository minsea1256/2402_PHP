// 함수(function)
// 입력을 받아 출력을 하는 일련의 과정을 정의한 것

// 함수 선언식 : 재할당이 가능하다, 호이스팅에 영향을 받는다(함수명이 동일하면 마지막 식으로 정의한다)
// 함수명이 중복되지 않도록 조심해야 한다
function mySum(a, b) {
    return a + b;
}

function mySum(a, b) {
    console.log('재할당');
}

// 함수 표현식 [**추찬**]
// 호이스팅에 영향을 받지 않고, 재할당을 방지한다
// function이름없음(a, b) : 이름이 없어 익명함수
const FNC_MY_SUM = function(a, b) {
    return a + b;
}

// 화살표 함수 : 문법상으로 간결하게 정의할수 있다 [**추찬**]
const FNC_MY_SUM_2 = (a, b) => a + b;
// 화살표 함수 사용시 주의할 패턴
// 파라미터가 없을 경우
const FNC_TEST1 = function() {
    return 'FNC_TEST1';
}

// 익명함수 사용시 적용시에 빈소괄호를 넣어준다
const FNC_TEST1_A = () => 'FNC_TEST1';
// console.log(FNC_TEST1_A()); 호츌 방법


// 파라미터가 1개일 경우
const FNC_TEST2 = function(str){
    return str;
}
// 1개일 경우 소괄호 생략이 가능하다
const FNC_TEST2_A = (str) => str;

// 리턴처리 이외의 처리가 있을 경우
const FNC_TEST3 = function(str) {
    if(str === 'a'){
        str = 'a입니다.';
    }
    return str;
}
// 중괄호 생략 불가능하다
// 중괄호 안에 위에 정의했던 식을 똑같이 작성한다
const FNC_TEST3_A = str => {
    if(str === 'a'){
        str = 'a입니다.';
    }
    return str;
}

// 콜백 함수 : 다른 함수의 파라미터로 전달되어 특정 조건에 따라 호출되는 함수
// 콜백함수에 객체를 넣어 작동이 가능하다
// const MY_SUB = (callBack(객체), num) => {
//     if(num === 3) {
//         return '3입니다.';
//     }
//     return callBack(객체)() - num; 여기서 객체식이 작동된다
// }
// const MY_CALLBACK = () => 10; -> 객체
const MY_SUB = (callBack, num) => {
    if(num === 3) {
        return '3입니다.';
    }
    return callBack() - num;
}
const MY_CALLBACK = () => 10;

// 즉시 실행 함수(IIFE) : 함수의 정의와 동시에 바로 호출되는 함수
// 딱 한번만 호출되고 다시는 호출 불가
// 이유는 모듈화, 스코프 보호, 클로저 형성
const MY_CLASS = (function() {
    const name = '홍길동';

    return {
        myPrint: function() {
            console.log(name + '입니다.');
        }
    }
})();