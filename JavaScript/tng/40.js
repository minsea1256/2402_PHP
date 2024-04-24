const BTN = document.querySelector('#btn');
const BTN2 = document.querySelector('.box-item');

function HI() {
    alert('안녕하세요');
    alert('숨어있는 div를 찾아보세요.');
}
BTN.addEventListener('click', HI);

BTN2.addEventListener('mouseenter', FIND);
function FIND() {
    alert('두근두근');
}
function FIND2(e) {
    alert('틀켰다!');
    e.target.style.backgroundColor = 'skyblue';
    BTN2.removeEventListener('click', FIND2);
    BTN2.addEventListener('click', FIND3);
    BTN2.removeEventListener('mouseenter', FIND);
}
function FIND3(z) {
    alert('다시 숨는다!');
    z.target.style.backgroundColor = '#000';
    BTN2.addEventListener('click', FIND3);
    BTN2.addEventListener('mouseenter', FIND);
    BTN2.removeEventListener('click', FIND3);
}

BTN2.addEventListener('click', FIND2);