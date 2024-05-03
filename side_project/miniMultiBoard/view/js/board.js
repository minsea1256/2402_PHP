document.querySelectorAll(".my-btn-detail").forEach(item => {
    item.addEventListener('click', () => {
        const url = '/board/detail?b_id=' + item.value;

        axios.get(url)
        .then(response => {
            const data = response.data[0];
            const btnDelete = document.querySelector('#my-btn-delete'); // 삭제 버튼
            const btnReport = document.querySelector('#my-btn-report'); // 신고 버튼
            const modalTitle = document.querySelector('.modal-title'); // 제목 노드
            const modalContent = document.querySelector('.modal-body > p'); // 내용 노드
            const modalImg = document.querySelector('.modal-body > img'); // 이미지 노드

            // 상세 정보 셋팅
            modalTitle.textContent = data.b_title;
            modalContent.textContent = data.b_content;
            modalImg.src = data.b_img;
            if(data.login_u_id !== data.u_id) {
                btnReport.classList.remove('d-none'); // 신고
                btnDelete.classList.add('d-none'); // 삭제
                btnDelete.value = '';
                btnReport.value = data.b_id;
            }else {
                btnReport.classList.add('d-none'); // 신고
                btnDelete.classList.remove('d-none'); // 삭제
                btnDelete.value = data.b_id;
                btnReport.value = '';
            }
        })
        .catch(err => console.log(err));
    });
});