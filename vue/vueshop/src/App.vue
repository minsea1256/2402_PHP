<!-- <template> : 화면에 출력하는 구문 -->
<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- 헤더 -->
  <!-- props : 자식 컴포넌트에게 props속성을 이용해서 데이터는 전달 -->
  <!-- <HeaderComponent :props="nav" /> -->
  <HeaderComponent :nav="nav" />
  <ModalDetail :product="product" :products="products" :flgModal="flgModal"  />
  <!-- <div class="nav"> -->
    <!-- 나브의 컨텐츠를 데이터 바인딩하고, 리스트 렌더링 처리를 해주세요. -->
    <!-- <a v-for="item in nav" :key="item.navName" href="#">{{ item.navName }}</a> -->
    <!-- <a href="#">상품</a>
    <a href="#">기타</a> -->
  <!-- </div> -->

  <!-- 상품 리스트 -->
  <div>
    <!-- <div v-for="item in products" :key="item.productName"> key에는 해당 vue가 인식할수 있는 코드를 작성 -->
    <div v-for="(item, key) in products" :key="key">
      <!-- @click="flgModal = !flgModal" 모달창 띄우기 -->
      <h4 @click="myOpenModal(item)">{{ item.productName }}</h4>
      <p>{{ item.price }}원</p>
      <!-- @click="price++" : 인라인 안에 클릭 이벤트 넣어주면 적용이 된다 -->
      <!-- <button @click="products[0].price += 1000">가격 증가</button> -->
    </div>
    <!-- <div>
      <h4 @click="myOpenModal(products[1])">{{ products[1].productName }}</h4>
      <p>{{ products[1].price }}원</p>
    </div>
    <div>
      <h4 @click="myOpenModal(products[2])">{{ products[2].productName }}</h4>
      <p>{{ products[2].price }}원</p>
    </div> -->
  </div>

  <!-- 모달 -->
  <!-- v-if="false" / "true" 참/거짓 조건으로 모달로 만들수 있다 -->
  
  <!-- <div class="bg_black" v-if="flgModal">
    <div class="bg_white">
      <img :src="{{ product.img }}"> 기존에 사용했던 문법을 js로 변경하고 싶을때 ':'콜론을 붙여준다 -->
      <!-- : 붙여주면 {{}} 괄호 빼줘야 한다 -->
      <!-- <img :src="product.img">
      <h4>{{ product.productName }}</h4>
      <p>{{ product.productContent }}</p>
      <p>{{ product.price }}원</p> -->
      <!-- @click="flgModal = !flgModal" 모달창 닫기 -->
      <!-- <button @click="flgModal = !flgModal">닫기</button> -->
    <!-- </div> -->
  <!-- </div> -->
  
</template>

<!-- <script setup> : 화면 작동하는 구문 -->
<script setup>
import { ref, reactive } from 'vue';
import HeaderComponent from './components/HeaderComponent.vue'; // 자식 컴포넌트 import
import ModalDetail from './components/ModalDetail.vue'; // 자식 컴포넌트 import

// -------------------------------------------------------------------------
// 데이터 바인딩 : 데이터 타입 적용시 문자열과 숫자열 잘 보고 넣어줘야 한다
// -------------------------------------------------------------------------
// ref, reactive 차이점은 console찍는 방법에서 다르다
// import { ref } from 'vue';
// const pants = ref('청바지');
// const price = ref(10000);
// console.log(pants.value); // 값을 찍을때

// reactive : 객체 타입만 사용 가능하며, 해당 객체에 대한 반응적 참조를 위해 사용
const products = reactive([
  {productName : '바지', price: 10000, productContent: '매우 아름다운 바지입니다.', img: require('@/assets/img/w.gif')}
  ,{productName : '티셔츠', price: 5000, productContent: '매우 아름다운 티셔츠입니다.', img: require('@/assets/img/img.gif')}
  ,{productName : '양말', price: 1000, productContent: '매우 아름다운 양말입니다.', img: require('@/assets/img/IMG_0829.gif')}
]);
// console.log(products[1].price); // 값을 찍을때

// ----------------
// 해더 처리
// ----------------
const nav = reactive([
  {navName : '홈'}
  ,{navName : '상품'}
  ,{navName : '기타'}
]);

// ----------------
// 모달용
// ----------------
// ref : 타입제한 없이 사용가능하나 일반적으로 string, number, boolean 과 같은 기본유형에 대한 반응적 참조를 위해 사용
const flgModal = ref(false); // 모달 표시용 플레그
// const : 빈배열에 개채가 변화가 있어서 전달이 안돼서 let으로 선언한다
let product = reactive({});
function myOpenModal(item) {
  flgModal.value = !flgModal.value;
  product = item;
}


</script>

<!-- <style> : 꾸미는 구문 -->
<style>
/* @import url(); - css에서 다른 파일 불려오는 코드 */
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* ㅊcss 파일 따로 분리 */
/* .nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
</style>
