<template>
    <div class="bg_black" v-if="data.flgModal">
        <div class="bg_white">
            <!-- <img :src="{{ product.img }}"> 기존에 사용했던 문법을 js로 변경하고 싶을때 ':'콜론을 붙여준다 -->
            <!-- : 붙여주면 {{}} 괄호 빼줘야 한다 -->
            <img :src="data.product.img">
            <h4>{{ data.product.productName }}</h4>
            <p>{{ data.product.productContent }}</p>
            <p>{{ data.product.price }}원</p>
        </div>
    </div>
</template>
<script setup>
import { defineProps } from 'vue';
// 타입을 명확하게 작성
const data = defineProps({
    'product':Object
    ,'flgModal':Boolean
});
console.log(data);
</script>
<style>
    
</style>