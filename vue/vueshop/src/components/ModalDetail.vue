<template>
    <Transition name="container">
        <div class="bg_black" v-if="data.flgModal">
            <div class="bg_white">
                <!-- <img :src="{{ product.img }}"> 기존에 사용했던 문법을 js로 변경하고 싶을때 ':'콜론을 붙여준다 -->
                <!-- : 붙여주면 {{}} 괄호 빼줘야 한다 -->
                <img :src="data.product.img">
                <h4>{{ data.product.productName }}</h4>
                <p>{{ data.product.productContent }}</p>
                <p>{{ data.product.price }}원</p>
                <p>총액 : {{ data.product.price*cnt }}원</p>
                <input type="number" min="1" v-model="cnt">
                <br>
                <br>
                <!-- @click="$emit('myCloseModal') : 부모쪽으로 요청을 보낸다-->
                <!-- @click="$emit('myCloseModal', 파라미터) : 파라미터로 데이터 보낼수 있다-->
                <button @click="close">닫기</button>
            </div>
        </div>
    </Transition>
</template>
<script setup>
import { defineEmits, defineProps, ref } from 'vue';
// 타입을 명확하게 작성
const data = defineProps({
    'product':Object
    ,'flgModal':Boolean
});
const emit = defineEmits(['myCloseModal']);
// 총액 처리 부분
const cnt = ref(1);

function close() {
    cnt.value = 1;
    emit('myCloseModal', data.product.price);
}
</script>
<style>
.container-enter-from {
    opacity: 0;
}
.container-enter-active {
    transition: 1s ease;
}
.container-enter-to {
    opacity: 1;
}

.container-leave-from {
    transform: translateX(0px);
}
.container-leave-active {
    transition: all 2s;
}
.container-leave-to {
    transform: translateX(1000px);
}
</style>