// RegExp[레젝스]

// String 객체
let str = '문자열 객체'; 
let str2 = new String('원래 이맇게 만들어야 한다');

// length : 문자열의 길이를 반환
console.log(str.length); //입력&길이 제한 할때 사용한다

// charAt() : 특정 인덱스의 문자를 반환
str.charAt(3);

// indexOf() : 문자열에서 특정 문자열을 찾아 최초의 인덱스를 반환
// 찾지못하면 '-1' 반환
str = '안녕하세요. 안녕하세요.';
str.indexOf('녕'); //찾고자 하는 최초의 문자열 반환 : 1
str.indexOf('효'); //찾고자 하는 문자열이 없으면 : -1
// indexOf 응용한 식
if(str.indexOf('안녕') < 0) {
    console.log('해당 문자열 없음');
}
// 검색을 시작할 인덱스 위치 지정하는 방법
// str.indexOf(찾고자하는 문자, 시작하는 인덱스 번호);
// includes() 호환성 문제가 있을때 indexOf() 사용해서 1/-1 확인하면 된다
str.indexOf('녕', 5); // 8 출력

// includes() : 문자열에서 특정 문자열을 찾아 true/false 반환 [**추천**] 
if(str.includes('하세요')) {
    console.log('검색 문자열 존재');
}

// replace() : 특정 문자열을 찾아서 최초의 인덱스를 지정한 문자열로 변경한다
str = 'abcdefg dede';
str.replace('de','안녕');

// relaceAll() : 모든 특정 문자열을 찾아서 지정한 문자열로 변경한 문자열을 반환
str.replaceAll('de','안녕');

// substring() : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
str = '안녕하세요. JavaScript입니다';
// str.substring(시작위치, 끝나는 위치);
str.substring(7, 17);
// str.substr(); 비슷하지만 사용하면 안된다 옛날에 잔제 [비표준으로 사용 금지!]

// 밑에 두개 식 다 동일한 작동---------------------------------------------------------------------------
str.substring(str.indexOf('JavaScript'),str.indexOf('JavaScript') + 'JavaScript'.length);
// str.substring(str.indexOf('찾는 문자'),str.indexOf('인덱스 시작') + '찾는 문자 길이'.length);

// 변수를 적용해서 현업에서 많이 사용하는 코딩 스타일이다
let pattern = 'JavaScript'; //찾는 문자열
let patternIndex = str.indexOf(pattern);
str.substring(patternIndex, patternIndex+pattern.length);
// str.substring(시작 위치[indexOf(해당문자열)], 끝 위치[해당문자열 시작+찾는 문자열길이].length);
// ----------------------------------------------------------------------------------------------------

// split() : separator를 기준으로 문자열을 잘라서 배열 요소로 담은 배열을 반환
str = '빵, 돼지숯불, 제육, 돈까스';
str.split(', ');
// 배열길이를 2로 제한
str.split(', ',2);

// trim() : 좌우의 공백을 제거해서 문자열로 반환하는 메소드
str = '       공백      ';
str.trim();

// toUpperCase()-대문자, toLowerCase()-소문자 : 알파벳을 대/소문자로 변환해서 반환하는 메소드
str = 'AdsvDvgF';
str.toUpperCase(); // 대문자로 전체 변경
str.toLowerCase(); // 소문자로 전체 변경
