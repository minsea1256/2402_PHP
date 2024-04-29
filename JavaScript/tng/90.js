function myAxiosGet() {
    // URL 획득
    const URL = document.querySelector('#input-url').value;
    // Axios 처리
    axios.get(URL)
    .then(response => {
        myMakeImg(response.data);
    })
    .catch(err => console.log(err));
    ;
}

// 사진 데이터를 화면에 추가 함수
function myMakeImg(data) {
    data.forEach(item => {
        // 부모요소 접근
        const CONTAINER = document.querySelector('.img-container');
        
        // img태크와 p태크를 묶어주는 역활 div 생성
        const ADD_ITEM = document.createElement('div'); //div 생성
        ADD_ITEM.setAttribute('class', 'item') //div 클래스 item 생성

        // p태크 생성
        const ADD_NUM = document.createElement('p');
        ADD_NUM.textContent = item.id;
        ADD_ITEM.appendChild(ADD_NUM);

        // img 태그 생성
        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url);
        
        // 이미지 화면에 추가
        ADD_ITEM.appendChild(ADD_IMG);
        // 화면에 추가
        CONTAINER.appendChild(ADD_ITEM);
    });
} 
// API 삭제 이벤트
const BTN_BT = document.querySelector('#btn-dt');
BTN_BT.addEventListener('click', function() {
    // ' '빈 문자열 방법
    // const BTN_BT = document.querySelector('.img-container');
    // BTN_BT.innerHTML = ' ';
    
    //  remove() 방법 : 한개씩 없어진다
    // const BTN_BT = document.querySelector('.img-container');
    // BTN_BT.remove();

    const BTN_BT = document.querySelector('.img-container');
    document.body.removeChild(BTN_BT);
    // 이미지 컨테이너 생성
    const ADD_CONT = document.createElement('div');
    ADD_CONT.setAttribute('class', 'img-container') //div 클래스 item 생성
    document.body.appendChild(ADD_CONT);
    ADD_CONT.addEventListener('click', myAxiosGet);
});

// API호출 버튼 이벤트
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);
