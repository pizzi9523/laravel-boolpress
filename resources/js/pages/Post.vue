<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="card">
          <img class="card-img-top" :src="'/storage/' + post.image" alt="" />
          <div class="card-body">
            <h4 class="card-title">{{ post.title }}</h4>
            <p class="card-text">{{ post.body }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: null,
    };
  },

  mounted() {
    // console.log(this.$route.params.id);
    axios.get("/api/posts/" + this.$route.params.id).then((response) => {
      console.log(response);
      this.post = response.data.data;
    });
  },
};
</script>

<style>
</style>