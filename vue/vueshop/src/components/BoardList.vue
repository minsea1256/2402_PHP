<template>
    <div>
        <slot></slot>
        <div v-for="(item, key) in data.products" :key="key">
            <h4 @click="$emit('myOpenModal', item)">{{ item.productName }}</h4>
            <p>{{ item.price }}원</p>
        </div>
    </div>
    <ProvideTest />
</template>
<script setup>
import { defineProps } from 'vue';
import ProvideTest from './ProvideTest.vue';

// 타입을 명확하게 작성
const data = defineProps({
    'products':Array
});

</script>
<style>
    
</style>