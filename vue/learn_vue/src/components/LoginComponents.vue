<template>
    <h1>로그인</h1>
    <input type="text" v-model="inputDate.account" placeholder="아이디">
    <br>
    <input type="text" v-model="inputDate.password" placeholder="비밀번호">
    <br>
    <button @click="store.commit('setAccount', inputDate.account)">로그인</button>
    <p>{{ store.state.account }}</p>
</template>

<script setup>
    import { reactive } from 'vue';
    import { useStore } from 'vuex';
    const store = useStore();
    const inputDate = reactive({
        account: '',
        password: '',
    });
</script>

<style>
</style>