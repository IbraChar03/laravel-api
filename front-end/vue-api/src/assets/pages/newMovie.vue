<script>

import axios from "axios"
export default {
    name: "categories",
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
    <h1>Create a New Movie</h1> <br>
    <form action=""
        method="POST">

        <label for="">Name : </label>
        <input type="text"
            name="name"> <br> <br>
        <label for="cashOut">Cash Out : </label>
        <input type="integer"
            name="cashOut"> <br> <br>
        <label for="year">Year : </label>
        <input type="number"
            name="year"> <br> <br>
        <label for="genre">Genre : </label>
        <select name="genre"
            id="">

            <option v-for="genre in genres"
                :value="genre.id"
                :key="genre.id">
                {{ genre.name }}
            </option>


        </select> <br> <br>
        <label for="">Tags : </label> <br>
        <div v-for="tag in tags">
            <input type="checkbox"
                :value="tag.id"
                name=tag>
            <label for="tag">{{ tag.name }}</label>
        </div> <br>

        <input type="submit"
            value="Create">
    </form>
</template>

<style></style>
