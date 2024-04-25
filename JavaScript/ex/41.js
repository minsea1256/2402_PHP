// 타이머 함수
// 자바스크립트는 기본적으로 동기화이다 하지만 타이머 함수는 비동기이다 [자세한 내용은 선생님노션으로]
// setTimeout(콜백함수, 시간(ms)) : 일정 시간이 흐른 후에 콜백 함수를 실행
// setTimeout : 병열처리로 비동기 이다
// setTimeout(() => (console.log('타임아웃')), 5000);

// // 1초뒤 A, 2초뒤 B, 3초뒤 C 출력
// setTimeout(() => (console.log('A')), 1000); // 1초
// setTimeout(() => (console.log('B')), 2000); // 2초
// setTimeout(() => (console.log('C')), 3000); // 3초

// A -> C -> B 출력됨
// console.log('A');
// setTimeout(() => (console.log('B')), 1000); 
// console.log('C');

// setTimeout() 있으면서 A -> B -> C 순서대로 출력하고 싶다
// console.log('A');
// setTimeout(() => {
//     console.log('B'); 
//     console.log('C'); 
// }, 1000);

// clearTimeout(타임아웃ID) : 해당 타임아웃ID의 처리를 제거하는 함수
const TIMEOUT_ID = setTimeout(() => console.log('ttt'), 5000); // 5초 실행
clearTimeout(TIMEOUT_ID); // 제거처리
console.log(TIMEOUT_ID);

const TIMEOUT_ID2 = setTimeout(() => console.log('aaa'), 5000); // 5초 실행
console.log(TIMEOUT_ID2);

// setInterval(콜백함수, 시간(ms)[, 아규먼트1, 아규먼트2 = 콜백함수를 순차적으로 출력가능하다]) : 일정 시간마다 콜백함수 실행
const INTERVAL_ID = setInterval(() => console.log('인터벌'), 1000);
// 인터벌 뒤에 숫자 순차적으로 올라간다
// let cnt = 1;
// setInterval(() => {
//     console.log('인터벌' + cnt);
//     cnt++;
// }, 1000);

// clearInterval(INTERVAL_ID) : 해당 intervalID
clearInterval(INTERVAL_ID); // 삭제처리

// 화면에 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타나게 해주세요.
const DO = setTimeout((e) => {
    document.write('두둥등장');
    const DOU = document.querySelector('body');
    DOU.style.fontSize = '100px';
    DOU.style.fontWeight = '900';
}, 5000);

// 또 다른 방법
setTimeout(() => {
    const H1 = document.createElement('h1'); // h1 태그 생성
    H1.innerHTML = '두둥등장'; //h1태그 컨텐츠 삽입
    H1.style.fontSize = '5rem'; //h1태그 글자크기 조절
    document.body.appendChild(H1); //body에 h1 추가

    // 3초 뒤에 삭제처리
    setTimeout(() => {
        const DEL_H1 = document.querySelector('h1'); // h1태그 요소 획득
        document.body.removeChild(DEL_H1); // h1요소 삭제
    }, 3000);
}, 5000);

// 콜백 지옥
// 비동기 처리를 동기 처리 처럼 만들기위해서 아래처럼 콜백 지옥 현상이 생긴다.
setTimeout(() => console.log('A'), 3000);
setTimeout(() => console.log('B'), 2000);
setTimeout(() => console.log('C'), 1000);

setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C');
        }, 1000);
    }, 2000);
}, 3000);
