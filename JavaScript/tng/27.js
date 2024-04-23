// 원본은 보존하면서 오름차순 정렬 해주세요
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
ARR3 = [...ARR1]; //복사
let result = ARR3.sort((a, b) => a - b); //콜백함수 이용
console.log(result);
// concat() : 빈칸으로 가져오면 원본을 보존할수 있다
result = ARR3.concat().sort((a, b) => a - b);

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
const ARR2 = [5, 7, 3, 4, 5, 1, 2, 6, 8];
//result은 위에 let을 선언해서 작성 안해도 괜찮지만
result = ARR2.filter(val => val %2 === 0);
//result2는 위에 let을 선언을 안해서 let을 꼭 작성해줘야 한다 조심
let result2 = ARR2.filter(val => val %2 !== 0);
console.log(result, result2);

// 다른 방식
const EVEN = [];
const ODD = [];
ARR2.forEach(num => {
    if(num %2 === 0){
        EVEN[EVEN.length] = num;
    }else{
        ODD[ODD.length] = num;
    }
});
console.log(EVEN, ODD);