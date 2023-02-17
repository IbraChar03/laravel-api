<script>
import axios from "axios"
export default {
    name: "editMovie",
    data() {
        return {
            modelName: "",
            modelYear: "",
            modelCashOut: "",
            modelTags: [],
            modelGenre: "",
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
        },
        createMovie(e) {
            const movie = {
                "year": this.modelYear,
                "name": this.modelName,
                "cashOut": this.modelCashOut,
                "tag": this.modelTags,
                "genre": this.modelGenre
            };
            console.log("movie", movie);
            axios.post(this.API_URL + "create", movie)
                .then(res => {
                    const success = res.data.success;
                    if (success) {
                        this.dataApi()
                    }
                }).catch((errors) => {
                    console.log(errors);
                });
            e.preventDefault()

        }

    },
    mounted() {
        this.dataApi()
    }


}
</script>

<template>
    <h1>Edit Movie</h1> <br>
    <form action="">
        <label for="">Name : </label>
        <input type="text"
            name="name"
            v-model="modelName"> <br> <br>
        <label for="cashOut">Cash Out : </label>
        <input type="integer"
            name="cashOut"
            v-model="modelCashOut"> <br> <br>
        <label for="year">Year : </label>
        <input type="number"
            name="year"
            v-model="modelYear"> <br> <br>
        <label for="genre">Genre : </label>
        <select name="genre"
            v-model="modelGenre">

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
                name=tag
                v-model="modelTags">
            <label for="tag">{{ tag.name }}</label>
        </div> <br>


        <input type="submit"
            @click="createMovie"
            value="create">
    </form>
</template>

<style></style>
