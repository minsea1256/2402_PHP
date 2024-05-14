// 상세 모달 처리
document.querySelectorAll(".my-btn-detail").forEach(item => {
    item.addEventListener('click', () => {
        const url = '/board/' + item.value;

        axios.get(url)
        .then(response => {
            const data = response.data;
            const btnDelete = document.querySelector('#my-btn-delete'); // 삭제 버튼
            const btnReport = document.querySelector('#my-btn-report'); // 신고 버튼
            const modalTitle = document.querySelector('.modal-header'); // 제목 노드
            const modalContent = document.querySelector('.modal-body > p'); // 내용 노드
            const modalImg = document.querySelector('.modal-body > img'); // 이미지 노드

            // 상세 정보 셋팅
            modalTitle.textContent = data.title;
            modalContent.textContent = data.content;
            modalImg.src = data.img;
            
            // 삭제 버튼 셋팅
            if(data.auth_id !== data.user_id) {
                btnReport.classList.remove('d-none'); // 신고
                btnDelete.classList.add('d-none'); // 삭제
                btnDelete.value = '';
                btnReport.value = data.id;
            }else {
                btnReport.classList.add('d-none'); // 신고
                btnDelete.classList.remove('d-none'); // 삭제
                btnDelete.value = data.id;
                btnReport.value = '';
            }
        })
        .catch(err => console.log(err));
    });
});

// 삭체 처리 (async로 작성)
// document.querySelector('#my-btn-delete').addEventListener('click', myDeleteCard);
// // async 시작
// async function myDeleteCard(e) {
//     console.log(e.target.value); // 삭제 버튼 id 번호 찾는 방법
//     const url = '/board/delete'; // url 설정

//     const data = new FormData(); // form 생성
//     data.append('b_id', e.target.value); // b_id 셋팅
    
//     try {
//         const response = await axios.post(url, data);
//         console.log(response);
//         // response.data = ['errorFlg': false, 'errorMsg': '', 'b_id': 16] 배열로 넘어 온다
//         // response.data = ['errorFlg' = false, 'errorMsg' = '', 'b_id' = 41];
//         if(response.data.errorFlg) {
//             // 에러일 경우
//             alert('삭제처리 실패 했습니다.');
//         }else {
//             // 정상일 경우
//             const main = document.querySelector('main'); // 부모 요소
//             // const card = document.querySelector('#card' + 42); // 삭제할 요소
//             const card = document.querySelector('#card' + response.data.b_id); // 삭제할 요소
//             main.removeChild(card);
//         }
//     } catch (error) {
//         console.log(error);
//     }
// }


// 삭제처리
document.querySelector('#my-btn-delete').addEventListener('click', MyDeleteCard)
function MyDeleteCard(e) {
    const url = '/board/' + e.target.value; //url
    // Ajax 처리
    axios.delete(url)
    .then(response => {
        if(response.data.errorFlg) {
            // 삭제 이상 발생
            alert('삭제 실패 했습니다');
        }else {
            // 정상처리
            const main = document.querySelector('main');
            const card = document.querySelector('#card' + response.data.deletedId);
            main.removeChild(card);
        }
    })
    .catch();
}
