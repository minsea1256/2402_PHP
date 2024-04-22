// 동적배열은 배열의 방의 갯수를 늘리고 줄이고가 가능하다
// 자바스크립트는 배열 = 베열 객체타입

// 배열
const ARR= [1, 2, 3, 4, 5];
console.log(ARR[2]);
console.log(ARR[5] = 6); //배열 추가값

// 배열의 길이 획득방법
console.log(ARR.length);
// length는 배열의 마지막번호의 다음번호를 담고있어 마지막에 적용이 가능하다
ARR[ARR.length] = 7; //[**추천**]

// 배열 여부 체크
// 전달된 아규먼트가 배열이면 true
console.log(Array.isArray(ARR));
// 아니면 false 반환
console.log(Array.isArray(1));

// indexOf() : 배열에서 특정요소를 검색해 해당 인덱스를 획득하는 메소드
// -1 값이 나오면 값이 없다, 양수값이 나오면 값이 있다
let arr = ['홍길동','갑순이','갑돌이'];
arr.indexOf('갑돌이');
if(arr.indexOf('갑돌이') < 0){
    // 요소가 없을 때 처리
}

// includes() : 배열에서 특정 요소의 존재 여부를 체크, 리턴 boolean
arr.includes('홍길동');
if(!(arr.includes('홍길동'))){
    // 요소가 없을 때 처리
}

// 배열 복사
arr = ['홍길동','갑순이','갑돌이'];
arr2 = [...arr]; //Spread Operator
// arr2 = arr; 참조 관계로 복사가 안됨
arr2.push('반장님');


// 메서드 사용시 원본을 변경하는 메서드도 있다 조심해서 사용할것
// 참조
/* - **push()**
- **pop()**
- **shift()**
- **unshift()**
- **splice()**
- **sort()**
- **reverse()**
- **fill()**
- **copyWithin()**
*/

// push() : 원본 배열의 마지막 요소를 추가, 리턴은 변경된 length
// push 많이 사용할수록 속도는 느려진다(백엔드 작업시)
// 배열에 값을 여러게를 한번에 넣을때 편하다
arr = ['홍길동','갑순이','갑돌이'];
let len = arr.push('반장님');
arr.push('나미리', '둘리'); // 파라미터를 복수 설정해서 여러 값을 한번에 추가하기 쉬움

// pop() : 원본 배열의 마지막 요소를 제거, 재거된 요소의 값 반환
// result 에는 제거한 효소값이 들어가 있다
arr = ['홍길동','갑순이','갑돌이'];
let result = arr.pop();
console.log(arr);

// unshift() : 원본 배열의 첫번째 요소를 추가, 변경된 length 반환
arr = ['홍길동','갑순이','갑돌이']; // 배열의 값
result = arr.unshift('둘리'); // 배열의 방 갯수
console.log(result, arr);

// shift() : 원본 배열의 첫번째 요소를 제거, 재거된 요소의 값 반환
result = arr.shift(); // 제거한 값   
console.log(result, arr);

// splice(start, count, …args) : 요소를 잘라서 자른 배열을 반환하는 메소드, 원본도 변경됨
// 직관적이지 않고 중간에 추가는건 잘 안 사용한다
arr = [1, 2, 3, 4, 5];
result = arr.splice(2); // 양수는 왼쪽기준으로 짤림
console.log(arr); // [1,2]
console.log(result); // [3,4,5]

arr = [1, 2, 3, 4, 5];
result = arr.splice(-2); // 음수는 오른쪽 기준으로 짤림
console.log(arr); // [1,2,3]
console.log(result); // [4,5]

// …args
arr = [1, 2, 3, 4, 5];
result = arr.splice(1, 2, 100, 200, 300);
console.log(arr); //[1, 100, 200, 300, 4, 5]
console.log(result); //[2, 3]

// count가 0일경우
// 짜르는 기능은 없고 추가만 하고싶을때
arr = [1, 2, 3, 4, 5];
result = arr.splice(2, 0, 100, 200);
console.log(arr); //[1, 2, 100, 200, 3, 4, 5]
console.log(result); //[]

// join() : 배열의 요소를 구분자로 연결한 문자열을 만들어서 반환
// 구분문자는 디폴트가 ","
arr = [1, 2, 3, 4];
result = arr.join(); // 구분문자는 디폴트가 ","
result = arr.join('a'); // ''콤마 안에 값을 넣으면 , 대신 적용이 된다
console.log(result);

// 소오트 = sort() : 배열의 요소를 문자열로 변환 후 오름차순 정렬 하고, 정렬된 배열을 반환
// 주의! 원본 배열이 변경됨, 원본 보존시 복사 후 사용
arr = [4, 3, 6, 1, 2, 5, 10];
// (a - b)가 양수일 경우, a가 큰수, b가 작은수로 인식하여 정렬
// (a - b)가 음수일 경우, a가 작은수, b가 큰수로 인식하여 정렬
// (a - b)가 0일 경우, 같은 값으로 인식하여 정렬하지 않음
// 양수값이 나오면 자리 변경
// 음수값이 나오면 변경없다
result = arr.sort((a, b) => a - b); // 숫자 오름차순 정렬
result = arr.sort((a, b) => b - a); // 숫자 내림차순 정렬
console.log(arr);
console.log(result);

// (a, b) => a - b식을 풀어서 작성시
// result = arr.sort(function(a, b){
//     console.log(a - b);
// });

// map() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후, 그 결과를 새로운 배열로 반환
arr  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// 모든 요소의 값 * 2를 한 결과를 얻고 싶다.
// [2, 4, 6, 8, 10, ...., 20]

let copyArr = [];
for(let val of arr) {
    copyArr[copyArr.length] = val * 2;
}
// map 메소드로 이용한 위에와 같은 식
let mapArr = arr.map(val => val * 2);

// some() : 배열의 모든요소에 대해서 콜백함수를 반복 실행하고,
// 조건에 만족하는 결과가 하나라도 있으면 true, 만족하는 결과가 하나도 없으면 false
arr  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.some(val => val === 11);

// every() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고,
// 모든 결과가 만족하면 true, 하나라도 만족하지 않으면 false
arr  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.every(val => val >= 1);

// filter() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고,
// 조건에 맞는 요소만 모아서 배열로 반환
arr  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.filter(val => val %3 === 0);

// forEach() : 배열의 모든요소에 대해서 콜백 함수를 반복 실행
arr  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// key필요 없으면 파라미터부분에 지워도 괜찮다
arr.forEach((val, key) => console.log(`key : ${key}, val : ${val}`));