// Promise 객체 : 콜백지옥을 개선하기 위해서 등장한 기법
// js의 비동기 프로그래밍에서 근간이 되는 기법

// 콜백지옥
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

// Promise 객체 생성
// 파라미터 2개의 콜백함수를 가짐 
// resolve : 작업이 성공했을 때 성공임을 알려주는 객체
// reject : 작업이 실패했을 때 실패임을 알려주는 오류 객체
const PRO = (str, ms) => {
    // reject는 생략가능하다 하지만 resolve는 꼭 있어야 한다
	return new Promise((resolve, reject) => {
		setTimeout(()=>{
            if(str === 'A') {
                resolve('성공 : A임'); // 작업 성공 resolve() 호출
            } else {
                reject('실패 : A아님'); // 작업 실패 reject() 호출
            }
		}, ms);
	});
}

// Promise 호출
// PRO('A', 5000)
// .then(result => console.log('then : ' + result)) // resolve 호출 됐을 때 [성공했을때]
// .catch(err => console.log('catch : ' + err)); // reject 호출 됐을 때 [실패했을때]



// 콜백지옥 : 가독성이 떨어진다
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

// 위에 콜백 지옥 개선
const PRO2 = (str, ms) => {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

// PRO2('A', 3000)
// .then(() => PRO2('B', 2000))
// .then(() => PRO2('C', 1000))
// .catch(() => console.log('ERROR'))
// .finally(() => console.log('파이널리'));

// 병렬 처리 방법(Promise.all())
// 병렬처리 : 한번에 실행하는 처리
const myLoop = cnt => {
    for(let i = 0; i < cnt; i++) {

    }
    console.log('myLoop 종료 : ' + cnt);
}
// 총 : 16초
// myLoop(1000000); // 10초
// myLoop(100000); // 5초
// myLoop(10000); // 1초

// Promise.all(배열);
// Promise.all([myLoop(10초), myLoop(5초), myLoop(1초)]); 걸리지만 한번에 실행해서 제일 늦게 나오는 시간 만큼 걸린다
// 총 : 10초
Promise.all([myLoop(1000000), myLoop(100000), myLoop(10000)]);