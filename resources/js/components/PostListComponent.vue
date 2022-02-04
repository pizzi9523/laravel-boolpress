<template>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-4 my-4" v-for="post in posts" :key="post.id">
          <div class="card">
            <img class="card-img-top" :src="'storage/' + post.image" alt="" />
            <div class="card-body">
              <h4 class="card-title">{{ post.title }}</h4>
              <p class="card-text">{{ post.body }}</p>
              <router-link :to="'/blog/' + post.id" class="btn btn-primary"
                >View Post</router-link
              >
            </div>
          </div>
        </div>
      </div>
      <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item" :class="!links.prev ? 'disabled' : ''">
            <span class="page-link" @click="prevPostPage">Previous</span>
          </li>
          <li
            class="page-item"
            :class="page == meta.current_page ? 'active' : ''"
            v-for="page in meta.last_page"
            aria-current="page"
            :key="page"
          >
            <span class="page-link" @click="goToPage(page)">{{ page }}</span>
          </li>
          <li class="page-item" :class="!links.next ? 'disabled' : ''">
            <span class="page-link" @click="nextPostPage">Next</span>
          </li>
        </ul>
      </nav>
    </div>

    <!-- <div class="pagination">
      <router-link :to="links.next" class="btn btn-primary"
        >Next Page</router-link
      >
    </div> -->
  </section>
</template>

<script>
export default {
  data() {
    return {
      posts: null,
      links: null,
      meta: null,
    };
  },

  methods: {
    fetchGames() {
      axios.get("/api/posts").then((response) => {
        // console.log(response);

        this.posts = response.data.data;
        this.links = response.data.links;
        this.meta = response.data.meta;

        console.log("Component mounted.");
        // console.log(this.links);
        // console.log(this.meta);
      });
    },

    nextPostPage() {
      axios.get(this.links.next).then((response) => {
        this.posts = response.data.data;
        this.links = response.data.links;
        this.meta = response.data.meta;
      });
    },

    prevPostPage() {
      axios.get(this.links.prev).then((response) => {
        this.posts = response.data.data;
        this.links = response.data.links;
        this.meta = response.data.meta;
      });
    },

    goToPage(page_param) {
      axios.get(this.meta.path + "?page=" + page_param).then((response) => {
        this.posts = response.data.data;
        this.links = response.data.links;
        this.meta = response.data.meta;
      });
    },
  },

  mounted() {
    this.fetchGames();
  },
};
</script>
