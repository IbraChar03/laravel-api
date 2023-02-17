<script>
import HeaderVue from "./components/HeaderVue.vue"
import Movies from "./assets/pages/Movies.vue"
export default {
  components: {
    HeaderVue,
    Movies
  },
  data() {
    return {

    }

  },

}
</script>

<template>
  <header>
    <!-- <HeaderVue /> -->
  </header>
  <main>
    <!-- <Movies /> -->
    <router-view></router-view>
</main>
</template>

<style></style>
