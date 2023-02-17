<script>
import axios from "axios"
export default {
    name: "movies",
    data() {
        return {
            movies: [],
            tags: [],
            genres: [],
            title: "",
            API_URL: "http://localhost:8000/api/v1/"
        }

    },
    methods: {
        dataApi() {
            axios.get(this.API_URL + "data")
                .then(res => (
                    this.movies = res.data.response.movies,
                    this.tags = res.data.response.tags,
                    this.genres = res.data.response.genres

                ))
        },
        color() {
            this.title = document.getElementById("title");
            this.title.style.color = "blue";
        }
    },
    mounted() {
        this.dataApi()
    }

}
</script>

<template>
    <h1 id="title"
        @click="color()">Movies</h1>
    <h3>
        <router-link :to="{ name: 'newMovie' }">Create a new Movie</router-link>
    </h3> <br>
    <ul>
        <li v-for="movie in movies">
            <strong>Movie Name : </strong> {{ movie.name }} <br>
            <strong>Release Year : </strong> {{ movie.year }} <br>
            <strong>Genre : </strong> {{ movie.genre.name }} <br>
            <strong>Tags : </strong>
        <li v-for="tags in movie.tags">
            {{ tags.name }}
        </li> <br> <br>

        <hr>
        <br>
        </li>

    </ul>
</template>

<style></style>
