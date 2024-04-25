// const clock = document.querySelector("h1");
const STOP = document.querySelector("#stop");
const START = document.querySelector("#start");
let myInterval = setInterval(myTimer, 1000); // 시작
myTimer(); //맨처음에 한번 실행

function myTimer() {
    const date = new Date();
    document.querySelector("h1").innerHTML = `현재 시각 ` + date.toLocaleTimeString(); //시간 & 화면출력
}
function myStopFunction() {
    clearInterval(myInterval); // 중단
}
STOP.addEventListener('click', myStopFunction); // 버튼연결

function myStartFunction() {
    myInterval = setInterval(myTimer, 1000); // 재시작
}
START.addEventListener('click', myStartFunction); //버튼연결
