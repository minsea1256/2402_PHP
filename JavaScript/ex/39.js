// 요소선택
// --------------------
// 고유한 ID로 요소를 선택
// document.getElementById('해당 id');
const TITLE = document.getElementById('title');
TITLE.style.color = 'blue'; //자바스크립트로 문자 색상변경하기

// 태그명으로 요소를 선택하는 방법
const H1 = document.getElementsByTagName('h1');
// H1[1].style.color = 'green';
// H1[1].style.fontSize = '3rem';
H1[1].style = 'color: green; font-size: 3rem;'; //스크립트에   스타일 요소 한번에 적용하는 방법

// 클래스 요소를 선택 [비추]
const CLASS_ELE = document.getElementsByClassName('none-li');

// CSS 선택자를 이용해서 요소를 선택
// [querySelector()]현업에서 자주 사용하는 쿼리 [추천]
const CSS_ID = document.querySelector('#title'); //아이디 선택자
const CSS_CLS = document.querySelector('.none-li'); //클레스 선택자 : 최상단에 있는 클레스만 가져온다
// NodeList객체이다 그러므로 루프를 돌리수 있다 ex)forEach
const CSS_CLS_ALL = document.querySelectorAll('.none-li'); // 모든 클레스 다 가져온다

// ul의 li자식 중 2번째 자식 선택-------------------------------------------------------------------------------------
const NthChild = document.querySelector('#ul > li:nth-child(2)'); //아이디 혹은 클레스명로 구분하는 경우가 많이 있다
// const STYLE = document.querySelectorAll('.none-li')[1]; // 필요없는 정보도 저장해서 속도가 느려짐으로 비추천 한다
// -----------------------------------------------------------------------------------------------------------------

// CSS_CLS_ALL에 획득한 모든 요소 글자색 변경 [루프문 이용]
CSS_CLS_ALL.forEach(node => node.style.color = 'red');
// 위에식 풀어놓은 코드-----------------------------------------------------------------------------------------------
/*
CSS_CLS_ALL.forEach(
    function(익명함수 = 선택한 클레스) {
        익명함수 = 선택한 클레스.style.color = 'red'
    }
);
*/
// -----------------------------------------------------------------------------------------------------------------


// -----------------------------------------------------------------------------------------------------------------
// 요소 조작
// -----------------------------------------------------------------------------------------------------------------
// textContent : 컨텐츠를 획득 또는 변경, 수순한 텍스트 데이터를 전달
TITLE.textContent = '텍스트 컨텐츠로 바꿈'; // 컨텐츠 변경
// TITLE.textContent = '<a>링크</a>' = '<a>링크</a>' 그대로 출력됨

// innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
// TITLE.innerHTML = '<a href="https://www.naver.com/">링크</a>'; //링크적용 가능
TITLE.innerHTML = '<a>링크</a>';

// setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const INPUT1 = document.querySelector('#input1'); // 아이디 선택
INPUT1.setAttribute('placeholder', '값값값'); // 플레이스홀더
INPUT1.setAttribute('name', 'input1'); //input태그 안에 name 추가

// removeAttribute('속성명') : 해당 속성을 요소에서 제거
INPUT1.removeAttribute('placeholder'); // 플레이스홀더 빼기
// TITLE.style = ''; 해당 속성을 요소에서 제거
// TITLE.removeAttribute ('style'); //해당 스타일을 요소에서 제거

// -----------------------------------------------------------------------------------------------------------------
// 요소 스타일링
// -----------------------------------------------------------------------------------------------------------------
// style : 인라인으로 스타일 추가
TITLE.style.color = 'blue'; 
TITLE.removeAttribute ('style');

// classList : 클래스로 스타일 추가 및 삭제
// classList.add('클래스명'); : 추가
TITLE.classList.add('font-color-red'); // 1개만 추가
// 여러 클래스를 적용하고 싶을때 콤마[,]로 구분해서 넣어주면 된다
TITLE.classList.add('font-color-red', 'css2', 'css3', 'css4', 'css5'); // 여러개 추가

// classList.remove('클래스명') : 삭제
TITLE.classList.remove('font-color-red'); //remove() : 삭제

// classList.toggle('클래스명') : 해당 클래스를 토글-[나타나다가 없어졌다가 하는 것]
TITLE.classList.toggle('none');

// 리스트의 요소들의 글자색을 짝수는 빨강, 홀수는 파랑으로 수정
const list = document.querySelectorAll('ul > li');
list.forEach((val, key) => {
        if(key %2 === 0){
            val.style.color = 'red';
        }else{
            val.style.color = 'blue';
    }
});

// 다른 방식 (odd:짝수, even:홀수)
const UL_LI_ODD = document.querySelectorAll('#ul li:nth-child(odd)');
UL_LI_ODD.forEach(node => node.style.color = 'red');
const UL_LI_EVEN = document.querySelectorAll('#ul li:nth-child(even)');
UL_LI_EVEN.forEach(node => node.style.color = 'blue');