// Date 객체

// "0"을 추가해주는 함수 ,todo : 호이스팅 문제로 맨 위에 배치
// 밑에 두개 식 다 동일한 작동---------------------------------------------------------------------------
const lpadZero = (val, length) => {
    return new String(val).padStart(length, '0');
}

function lpadZero2(val, length) {
    return new String(val).padStart(length, '0');
}
// ----------------------------------------------------------------------------------------------------


// 현재날짜 / 시간 획득
const NOW = new Date(); //객체를 통해 인스턴스 할수 있다

// getFullYear() : 연도만 가져오는 메소드 (yyyy)
// getYear() 사용하면 안된다!
const YEAR = NOW.getFullYear();

// getMonth() : 월만 가져오는 메소드, 0 ~ 11을 획득
const MONTH = NOW.getMonth() + 1; //+1 해줘서 오늘 달을 가져올수 있다
const MONTH2 = lpadZero(NOW.getMonth() + 1, 2); // 숫자부분에 "00" 적용하는 식

// getDate() : 일을 가져오는 메소드
const DATE = NOW.getDate(); //0부터 안 가져와 +1 안해줘도 오늘 날짜 불려온다
const DATE2 = lpadZero(NOW.getDate(), 2); // 숫자부분에 "00" 적용하는 식

// gethours() : 시를 가져오는 메소드
const HOUR = NOW.getHours();
const HOUR2 = lpadZero(NOW.getHours(), 2); // 숫자부분에 "00" 적용하는 식

// getminutes() : 분을 가져오는 메소드
const MINUTE = NOW.getMinutes();
const MINUTE2 = lpadZero(NOW.getMinutes(), 2); // 숫자부분에 "00" 적용하는 식

// getSeconds() : 초를 가져오는 메소드
const SECOND = NOW.getSeconds();
const SECOND2 = lpadZero(NOW.getSeconds(), 2); // 숫자부분에 "00" 적용하는 식

// getMilliseconds() : 미리초를 가져오는 메소드
const MILLISECONDS = NOW.getMilliseconds();
const MILLISECONDS2 = lpadZero(NOW.getMilliseconds(), 2); //숫자부분에 "000" 적용하는 식

// getDay() : 요일을 가져오는 메소드, 0(일요일) ~ 6(토요일) 반환
const DAY = NOW.getDay();

const changeDayToKoreanDay = num => {
    switch(num) {
        case 0:
            return '일요일';
        case 1:
            return '월요일';
        case 2:
            return '화요일';
        case 3:
            return '수요일';
        case 4:
            return '목요일';
        case 5:
            return '금요일';
        case 6:
            return '토요일';
    }
} 

// 요일 한글로 변환 함수
const DAY2 = changeDayToKoreanDay(NOW.getDay());

// 날짜 포맷 : 위에 만들어줬던 메소드를 이용해서 날짜와 시간 만들기
const FOMAT_DATE = `${YEAR}-${MONTH2}-${DATE2} ${HOUR2}:${MINUTE2}:${SECOND2}, ${changeDayToKoreanDay(DAY)}`;
console.log(FOMAT_DATE);


// 자바스크립트는 미리초 단위로 되어있다 - 조심할것!
// getTime() : UNIX 타임스탬프를 반환
const TIME = NOW.getTime();

// 일수 차이
const TARGET_DATE = new Date('2024-04-03 00:00:00'); //시분초 기본값이 00:00:00 으로 작성 안해도 기본값으로 나온다

const DIFF_DATE = Math.floor(Math.abs(TARGET_DATE - NOW) / 86400000);
// 1000[미리초]*60[초]*60[분]*24[하루시간] = 86400000[일 수 미리초 값]
// 1000[미리초]*60[초]*60[분]*24[하루시간]*30[한달] = [개월 수 미리초 값]

// 2024-01-01 13:00:00 과 2025-05-30 00:00:00은 몇개월 후 입니까?
const TAEGET_DAY = new Date(2024, 0, 1, 13); // 년, 월(0부터 시작), 일, 초 작성 가능
const TAEGET_DAY2 = new Date('2025-05-30 00:00:00'); // 시분초 없이 작성 가능
const DTFF_DAY = Math.floor(Math.abs(TAEGET_DAY - TAEGET_DAY2) / (1000*60*60*24*30));
console.log(DTFF_DAY);