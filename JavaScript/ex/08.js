// --------------------
// 조건문 (if, switch)
// --------------------
/*
// 기본형태
if(조건1) {
	// 조건1이 참이면 실행할 처리
}
// 조건1이 거짓일경우 다음 체크로 진행
else if(조건2) {
	// 조건2가 참이면 실행할 처리
}
// 앞선 조건1, 조건2 모두 거짓일경우 else가 실행
else {
	
}
*/

// 1이면 1등, 2면 2등, 3이면 3등, 나머지는 순위 외, 5번만 특별상을 출력
let num = 1;

if(num === 1) {
    console.log('1등');
}else if(num === 2) {
    console.log('2등');
}else if(num === 3) {
    console.log('3등');
}else if(num === 5) {
    console.log('특별상');
}else {
    console.log('순위 외');
}
// 위에 식과 동일한 식
if(num <= 3) {
    console.log( num +'등' );
}else if(num === 5) {
    console.log('특별상');
}else {
    console.log('순위 외');
}

// 나이가 20이면 "20대", 30이면, "30대", 나머지는 "모르겠다"
// switch : 범위를 비교할때는 적절하지 않다, 1대1로 비교할때 사용한다 ex)성별
let age = 29;
switch(age) {
    case 20:
        console.log("20대");
        break;
    case 30:
        console.log("30대");
        break;
    default:
        console.log("모르겠다");
        break;
}

// --------------------
// 반복문 (for, while, do_while)
// do_while : 잘 안사용 한다
// -------------------- 
for(let i = 1; i < 11; i++){
    if(i % 3 === 0){
        continue; //조건은 실행하지 않고 다음으로 넘어간다
    }
    console.log(i + "번째 루프");
    
    if(i === 7){
        break; //루프 처리 종료
    }
}
let cnt = 1;
while(cnt <= 10) {
    if(cnt % 3 === 0){
        cnt++;
        continue; //조건은 실행하지 않고 다음으로 넘어간다
    }
    console.log(cnt + "번쩨 루프");
    if(cnt === 7){
        break; //루프 처리 종료
    }
    cnt++;
}

// 구구단
let num1 = 2;
while(num1 < 20) {
    console.log('*' + num1 + '단*');
    cnt1 = 0;
    while(cnt1 < 19){
        cnt1++;
        go = (num1 + 'X' + cnt1 + '=' + (num1*cnt1));
        console.log(go);
    }
    num1++;
}

// for문으로 작성
const DAN = 19;
for(let dan = 2; dan <= DAN; dan++){
    // console,log(`**${dan}단**`); 백틱 넣고 적용하고 싶은 변수를 넣어줄수 있다
    console.log(`**${dan}단**`);
    for(let multi = 1; multi <= DAN; multi++){
        console.log(`${dan} X ${multi} = ${dan*multi}`);
    }
}

//  for...in : 모든 객체를 반복하는 문법
// key에만 접근이 가능
const OBJ = {
    key1: 'val1'
    ,key2: 'val2'
};

for(let key in OBJ){
    console.log(OBJ[key]); //위에 식에서 val가져오기 위해 배열로 가져온다
}

const ARR1 = [1, 2, 3]; //배열 객체
// key는 방 번호 , ARR1[key]는 방안에있는 값 을 가져온다
for(let key in ARR1) {
    console.log(ARR1[key]);
}

// iterable(이터레이터객체) : 순서가 정해져있는 객체
// String, Array 가장 많이 사용한다 / Map, Set 백엔드에서 자주 사용한다
// for...of : iterable 객체를 반복하는 문법 (String, Array, Map, Set, TypeArray..)
// value에만 접근이 가능
// 이터러블 확인시 변수.length가 있다/없다 로 구분이 가능하다
// const STR1 = String('안녕하세요');
const STR1 = '안녕하세요';
for(let val of STR1){
    console.log(val);
}