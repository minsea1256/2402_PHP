// 콜백함수
// 함수 두근두근
const myDokidoki = () => {
    alert('두근두근');
}
// 함수 들켰다.
const myBusted = () => {
    const DIV_CONTAINER = document.querySelector('.container');
    const DIV_BOX = document.querySelector('.box');
    alert('들켰다!');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', myBusted); // 기존 들켰다 이벤트 제거
    // 4번 숨는다 이벤트 추가
    DIV_BOX.addEventListener('click', myHide); // 숨는다 이벤트 추가
    DIV_CONTAINER.removeEventListener('mouseenter', myDokidoki); // 기존 두근두근 이벤트 제거
}
// 함수 숨는다.
const myHide = () => {
    const DIV_CONTAINER = document.querySelector('.container');
    const DIV_BOX = document.querySelector('.box');
    alert('다시 숨는다!');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', myHide); // 기존 들켰다 이벤트 제거
    DIV_BOX.addEventListener('click', myBusted); // 들켰다 이벤트 추가
    DIV_CONTAINER.addEventListener('mouseenter', myDokidoki); // 기존 두근두근 이벤트 추가

    // 랜덤 위치 조절 : 랜덤값 * (브라우저 너비&높이 - div.container 너비&높이)의 반올림
    // 같은 값이 들어가서 랜덤 두번 돌렸다.
    // innerWidth : 윈도우에 최대 넓이
    // innerHeight : 윈도우에 최대 높이
    const RAMDOM_Y = Math.round(Math.random() * (window.innerWidth - DIV_CONTAINER.offsetWidth)); // 선택함수.offsetWidth : 선택함수 넓이를 알수있다
    const RAMDOM_X = Math.round(Math.random() * (window.innerHeight - DIV_CONTAINER.offsetHeight)); // 선택함수.offsetHeight : 선택함수 높이를 알수있다
    // const RAMDOM_X = Math.round(Math.random() * (window.innerWidth - 100)); // window.innerWidth - 상자의 크기를 빼서 윈도우 밖으로 나가는 것을 방지
    DIV_CONTAINER.style.top = `${RAMDOM_Y}px`;
    DIV_CONTAINER.style.left = `${RAMDOM_X}px`;
}



// --------------------------------------------------------------------------------------------------------------------------------------------------------------
// 전역선언 -> 즉시실행 함수로 변경
// 즉시실행 : 불필요한 요소를 한번만 사용하고 메모리에서 지운다
(() => {   
// 1. 버튼을 클릭시 알러트가 나옵니다.
const BTN_INFO = document.querySelector('#btn-info');
BTN_INFO.addEventListener('click', () => (alert('안녕하세요.\n숨어있는 div를 찾아보세요.'))); // alert는 자바스크립트 구문으로 '\n'으로 개행을 한다

// 2. 특정 영역에 마우스 포인터가 진입하면 알러트가 나옵니다.
const DIV_CONTAINER = document.querySelector('.container');
DIV_CONTAINER.addEventListener('mouseenter', myDokidoki);

// 2-2. 틀킨 상태에서는 알러트가 안나옵니다. 안 들켰으면 계속 알러트가 나와야 합니다.

// 3. 2번 영역을 클릭하면 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다
const DIV_BOX = document.querySelector('.box');
DIV_BOX.addEventListener('click', myBusted);

// 4. 3번의 상태에서 다시 한번더 클릭하면 알러트를 출력하고, 배경색이 투명으로 나타납니다.

// 4-2 다시 숨을 때 위치 랜덤


})();