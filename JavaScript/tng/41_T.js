// 시간 포멧 : 오전 09:10:30
const leftPadZero = (target, length, fillStr) => {
    return String(target).padStart(length, fillStr);
}

const GET_DATE = () => {
    const NOW = new Date(); //Date 객체(현재시간) 생성
    let hour = NOW.getHours(); // 시간 획득(24시 포맷)
    let minute = NOW.getMinutes(); // 분 획득
    let second = NOW.getSeconds(); // 분 획득
    let ampm = '오전'; // 오전, 오후
    let hour_12 = hour; // 시간(12시 포맷)

    if(hour > 12) {
        ampm = '오후'
        hour_12 = hour - 12;
    }

    // 시간 출력
    let printTime = 
        ampm + ' '
        + leftPadZero(hour_12, 2, '0') + ':'
        + leftPadZero(minute, 2, '0') + ':'
        + leftPadZero(second, 2, '0');
    
    const SPAM_TIME = document.querySelector('#time');
    SPAM_TIME.textContent = printTime;
}

// 전역스코프 쪽에서 실행하는 함수를 안 넣어주는게 좋지만 안되면 최초 1회 실행 하게 해준다
// (() => {
//     GET_DATE();
// })();
GET_DATE();
let intervalID = setInterval(GET_DATE, 1000);

// 멈춰 버튼
const BTN_STOP = document.querySelector('#btn-stop');
BTN_STOP.addEventListener('click', () => {
    clearInterval(intervalID);
});

// 재시작 버튼
const BTN_RESTART = document.querySelector('#btn-restart');
BTN_RESTART.addEventListener('click', () => {
    GET_DATE(); //재시작 버튼 클릭과 동시에 현재시간 화면에 띄우기 위한
    intervalID = setInterval(GET_DATE, 1000);
})