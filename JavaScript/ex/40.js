// 함수표현식 : 호이스팅 안됨, 재할당 안됨, 장점 : [개발자 실수를 줄여준다]
// const FNC1 = (a, b) => a + b;

// 함수 선언식 : 호이스팅이 적용이된다, 재할당 된다, 장점 : [호이스팅이 적용이 안돼서 선언위치를 신경안해도 된다]
//  function myFnc1(a, b) {
//     return a + b
// }

// 이벤트 : 특정 해위를 감지하고 실행시키는 처리

// 인라인 이벤트 : html에 태크안에 적용된다[간단한 처리 아니면 안 사용한다]
// 단점 : 자바스크립트 파일과 html파일에 여기저기 사용해서 수정&관리가 힘들어진다
function myAlert() {
    alert('안녕하세요. myAlert()');
}

// 프로퍼티 리스터 : DOW으로 접근하고 접근한 요소에 추가한다 [**적극적으로 사용 안한다**]
// 단점 : 같은 이벤트는 추가할수 없다 이벤트가 많으면 관리하기 힘들어진다
const btn2 = document.querySelector('#btn2');
// btn2.onclick = () => (alert('안녕하세요.'));
btn2.onclick = myAlert; //함수이지만 ()소괄호를 안 붙이 이유는 : 자바 파일에서 실행하면 안된다, 클릭했을때 사용하는 거라서 콜백함수를 이용해 나중에 실행해야해서 이다

// addEventListener : 동일한 이벤트 추가 할수 있다 [**추천**]
const BTN3 = document.querySelector('#btn3');
// BTN3.addEventListener(유저행위, 콜백함수 );

BTN3.addEventListener('click', () => (alert('버튼3')));
BTN3.addEventListener('click', function(){
    alert('버튼31111111')
});
BTN3.addEventListener('click', test);


// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// removeEventListener() : 이벤트 삭제시 사용했던 이벤트 형식과 콜백함수가 동일해야 한다
// 기존에 있던 이벤트 삭제 , 삭제시 콜백함수가 동일해야한다 , 삭제하고 싶은 이벤트 코드와 동일해야 한다

// function() 삭제가 안돼는 이유 : 객체가 달라서 삭제가 안된다
BTN3.removeEventListener('click', function(){
    alert('버튼31111111')
}); // 제거 안됨

// 추가했던 코드와 동일하게 넣어준다
BTN3.removeEventListener('click', test); // 제거 됨

function test() {
    alert('test함수 알러드');
}
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// 이벤트 객체 : 자바스크립트가 자동으로 만들어주는 객체, 언제 만들어지냐 하면 이벤트가 발생했을때 모든 정보를 객체 안에 넣어준다
const BTN4 = document.querySelector('#btn4');
BTN4.addEventListener('click', e => {
    console.log(e); //이벤트 객체
    console.log(e.target); //버튼 노드(요소)
    console.log(e.target.value); //버튼 컨텐츠
    // 지금 이벤트 같은 경우는 
    // e.target = document.querySelector('#btn4'); 동일하다 그래서 e.target선택해서 스타일 적용이 가능하다
    e.target.style.color = 'green'; //클릭시 글자색상 변경
});

// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// 팝업
const BTN_POPUP = document.querySelector('#popup');
BTN_POPUP.addEventListener('click', () => {
    // window.open('링크', '타켓', '크기');
    window.open('https://naver.com', '', 'width=500 height=500');
});

// 모달
const BTN_MODAL = document.querySelector('#btn-modal');
BTN_MODAL.addEventListener('dblclick', toggleModalContainer); //더블 클릭시 작동
// BTN_MODAL.addEventListener('click', toggleModalContainer); // 한번 클릭시 작동

function toggleModalContainer() {
    const MODAL_CONTAINER = document.querySelector('.modal-container'); //modal-container가져오기
    MODAL_CONTAINER.classList.toggle('display-none');
}
// 모달 컨테이너 영역 클릭시 모달 닫기
const MODAL_CONTAINER = document.querySelector('.modal-container');
MODAL_CONTAINER.addEventListener('click', toggleModalContainer);

// 모달 아이템 영역 눌렸을 때 안꺼지게 하는 방법 중 하나
// (맨위에)자식 요소에 이벤트 실행 후 (밑에)부모 요소 이벤트도 실행해서 안꺼지게 한다
const TEST = document.querySelector('.modal-item');
// 함수표현식 : 특정 동작을 삭제 혹은 수정이 있을때 사용
TEST.addEventListener('click', toggleModalContainer);

// 마우스를 눌렀을때 이벤트
const H1 = document.querySelector('h1');
// 함수 선언식 : 특정 동작을 삭제 혹은 수정이 없을 때 사용
// mousedown : 마우스를 눌렀을 때 이벤트
H1.addEventListener('mousedown', e => {
    e.target.style.backgroundColor = 'skyblue';
});
// mouseup : 마우스를 땠을 때 이벤트
H1.addEventListener('mouseup', e => {
    e.target.style.backgroundColor = 'blue';
});
// mouseenter : 마우스 포인터가 집입했을 때 이벤트
H1.addEventListener('mouseenter', e => {
    e.target.style.color = 'red';
});
// mouseleave : 마우스 포인터가 벗어났을 때 이벤트
H1.addEventListener('mouseleave', e => {
    e.target.style.color = '#000';
});


