<template>
  <div class="page">
    <h1 class="text-center">Blog</h1>
    <post-list-component-vue></post-list-component-vue>
  </div>
</template>

<script>
import PostListComponentVue from "../components/PostListComponent.vue";
export default {
  components: { PostListComponentVue },
};
</script>

<style>
</style>