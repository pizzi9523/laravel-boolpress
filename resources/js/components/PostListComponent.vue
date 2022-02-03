<template>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-4" v-for="post in posts" :key="post.id">
          .
          <div class="card">
            <img class="card-img-top" :src="'storage/' + post.image" alt="" />
            <div class="card-body">
              <h4 class="card-title">{{ post.title }}</h4>
              <p class="card-text">{{ post.body }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      posts: null,
    };
  },

  mounted() {
    axios.get("/api/posts").then((response) => {
      console.log(response.data.data);
      this.posts = response.data.data;
    });
    console.log("Component mounted.");
  },
};
</script>
