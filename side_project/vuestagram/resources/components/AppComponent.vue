<template>
    <!-- header -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <div class="title">
                    <router-link to="/board"><h1>Vuestagram</h1></router-link>
                </div>
                <img class="img-logo" src="/logo.gif">
                <div class="btn-group">
                    <div v-if="!$store.state.authFlg">
                        <router-link to="/login"><button class="btn btn-header btn-bg-black">로그인</button></router-link>
                        <router-link to="/user"><button class="btn btn-header btn-bg-white">가입하기</button></router-link>
                    </div>
                    <div v-else>
                        <button @click="$store.dispatch('logout')" class="btn btn-header btn-bg-black">로그아웃</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <!-- main -->
    <main>
        <UserInfoComponent v-if="$store.state.authFlg" />
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
    <!-- footer -->
    <footer>
        <p>2024년05월20일 ing~</p>
    </footer>
</template>

<script setup>
import UserInfoComponent from './UserInfoComponent.vue';
</script>

<style>
@import url('../css/common.css');
</style>