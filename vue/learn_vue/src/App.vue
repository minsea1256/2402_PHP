<template>
  <img alt="Vue logo" src="./assets/img.gif"> 
  <h1>짱구와 함께하는</h1>
  <p>월 330만원</p>
  <p>식단조절 없이 운동만으로 하루에 <br> <strong>-10kg!</strong> <br> 궁금하면 놀려오세요~</p>
  <p>궁금하다 {{ cnt }}</p>
  <button @click="cnt++">인정</button>
  <br>
  <br>
  <main>
    <router-link to="/login"><button>로그인</button></router-link>
    <router-link to="/board"><button>게시판</button></router-link>
    <router-view></router-view>
    <button @click="movePath('/login')">JS 로그인</button>
    <button @click="movePath('/board')">JS 게시판</button>

    <!-- flg : url 이동이 없어서 문제가 있다 -->
    <!-- <button @click="flg = 0">로그인</button>
    <button @click="flg = 1">게시판</button>
    <BoardComponents v-if="flg === 1" />
    <LoginComponents v-if="flg === 0" /> -->
  </main>
</template>

<script setup>
import { onBeforeMount, onMounted, onBeforeUpdate, onUpdated, onBeforeUnmount, onUnmounted, ref } from 'vue';
import router from './router';
// import BoardComponents from './components/BoardComponents.vue';
// import LoginComponents from './components/LoginComponents.vue';

// 컴포넌트 전환용 플레그
// const flg = ref(0);

// -------------------------
// js에서 vue route 사용
// -------------------------
function movePath(path) {
  // router.push(path); // push('경로') : URL 히스토리를 추가하면서 URL 이동 [저장이 되어 뒤로가기 가능하다]
  router.replace(path); // replace('경로') : URL 히스토리를 추가하지 않고 URL 이동
}


// 라이프 사이클 테스트용
const cnt = ref(0);

onBeforeMount(() => {
  console.log('비포 마운트'); // 기존 출력
});
onMounted(() => {
  console.log('마운트드'); // 기존 출력
});
onBeforeUpdate(() => {
  console.log('비포 업데이트'); // 출력 업데이트
});
onUpdated(() => {
  console.log('업데이티드'); // 출력 업데이트
});
onBeforeUnmount(() => {
  console.log('비포 언마운트');
});
onUnmounted(() => {
  console.log('언마운티드'); // 기존 데이터 없애고 다시 새롭게 출력
});
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
