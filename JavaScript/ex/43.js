// Axios[엑시오스]


// axios.http포스트('링크');
axios.get('https://picsum.photos/v2/list?page=1&limit=5')
.then(response => {
    console.log(response);
    console.log(response.data);
}) // 성공
.catch(err => console.log(err)) //실패
.finally(() => console.log('파이널리')) // 성공 실패 상관없이 계속 실행
;
// function myAxiosGet() {
//     // URL 획득
//     const URL = document.querySelector('#input-url').value;

//     // Axios 처리
//     axios.get(URL)
//     .then(response => {
//         myMakeImg(response.data);
//     })
//     .catch(err => console.log(err));
//     ;
// }

// // 사진 데이터를 화면에 추가 함수
// function myMakeImg(data) {
//     data.forEach(item => {
//         // 부모요소 접근
//         const CONTAINER = document.querySelector('.img-container');
        
//         // img 태그 생성
//         const ADD_IMG = document.createElement('img');
//         ADD_IMG.setAttribute('src', item.download_url);
//         ADD_IMG.style.width = '200px';
//         ADD_IMG.style.height = '200px';
        
//         // 이미지 화면에 추가
//         CONTAINER.appendChild(ADD_IMG);
//     });
// } 

// API호출 버튼 이벤트
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);