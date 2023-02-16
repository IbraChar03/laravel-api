<script>
import axios from "axios"
export default {
  data() {
    return {
      movies: []
    }

  },
  mounted() {
    axios.get("http://localhost:8000/api/movies")
      .then(res => (
        this.movies = res.data.movies,
        console.log(this.data)
      ))
  }
}
</script>

<template><h1>Hello World</h1></template>

<style></style>
