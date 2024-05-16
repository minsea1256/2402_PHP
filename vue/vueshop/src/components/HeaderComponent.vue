<!-- components 파일명 작성할때 두단어 이상의 조합으로 작성해야한다 -->
<!-- template기본형태 -->
<!-- <template>
</template>
<script setup>
</script>
<style>
</style> -->

<template>
    <!-- 헤더 -->
    <div class="nav">
        <!-- 나브의 컨텐츠를 데이터 바인딩하고, 리스트 렌더링 처리를 해주세요. -->
        <a v-for="item in data.nav" :key="item.navName" href="#">{{ item.navName }}</a>
        <!-- <a href="#">상품</a>
        <a href="#">기타</a> -->
    </div>
</template>
<script setup>
import { defineProps } from 'vue';
// 타입을 명확하게 작성
const data = defineProps({
    'nav':Array
});

</script>
<style>
    
</style>