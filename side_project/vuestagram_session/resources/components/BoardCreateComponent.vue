<template>
    <form class="form-box" id="boardCreateForm">
      <h3 class="form-title">글 작성</h3>
      <img :src="preview">
      <textarea name="content" placeholder="내용을 적어주세요." max="200"></textarea>
      <input @change="setFile"  type="file" name="img" accept="image/*">
      <button @click="$store.dispatch('boardStore')"  type="button" class="btn btn-submit btn-bg-black">작성</button>
      <button @click="$router.back()" type="button" class="btn btn-submit">취소</button>
    </form>
  </template>
  <script setup>
  import { reactive, ref } from 'vue';

  const boardInfo = reactive({
      content: '',
      img: null,
  });
  const preview = ref('');

  function setFile(e) {
      boardInfo.img = e.target.files[0];
      preview.value = URL.createObjectURL(boardInfo.img); // 임시적으로 이미지 띄우는 코드
  }
  </script>
  <style>
  </style>
