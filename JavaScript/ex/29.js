// Math 객체

// 올림, 반올림, 버림
Math.ceil(0.1); // 올림 1 출력
Math.round(0.5); // 반올림 1 출력
Math.floor(0.9); // 버림 0 출력

// 랜덤값
Math.random(); // 0 ~ 1 랜던함 수를 반환
// 1 ~ 10 랜덤 숫자 획득
Math.ceil(Math.random() * 10);
// for로 100번 랜덤 숫자 획득하기
/*
for(let i = 0; i < 100; i++) {
    console.log(Math.ceil(Math.random() * 10)); //콘솔로 찍으면 속도가 느리다
}
*/

// 최소값, 최대값, 절대값
// 원본을 보내지 않고 복사값을 보내줘야 작동 가능하다
const ARR = [4,6,5,12,4,8,6,7,89,15,12,46,897];
let max = Math.max(...ARR); //최대값
console.log(max);

let min = Math.min(...ARR); //최소값
console.log(min);

// 밑에 두개식은 부등호가 없어져 동일한 값을 가져온다
// 달력계산할때 많이 사용한다, 은행권에서도 많이 사용한다
Math.abs(1); //절대값
Math.abs(-1); //절대값