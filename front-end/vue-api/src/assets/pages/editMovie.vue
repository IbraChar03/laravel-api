<script>
import axios from "axios"
export default {
    name: "editMovie",
    data() {
        return {
            selectedCheck: [],
            movieObj: "",
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

        logMovie() {
            console.log(this.movieObj);
        },
        getMovie() {
            axios.get(this.API_URL + "editMovie/" + this.$route.params.id)
                .then(res => {
                    this.movieObj = res.data.response;
                    console.log(this.movieObj);


                }).catch((errors) => {
                    console.log(errors);
                });
        },
        movieTags(tag) {
            for (let index = 0; index < this.movieObj.tags.length; index++) {
                const element = this.movieObj.tags[index];
                if (element.id == tag.id) {

                    return true;

                }

            }
            return false;
        },
        checkboxs() {
            let check = document.getElementsByClassName("input");
            for (let index = 0; index < check.length; index++) {
                const element = check[index];
                for (let index = 0; index < this.movieObj.tags.length; index++) {
                    const el = this.movieObj.tags[index];
                    if (el.id !== element.value && element.checked) {
                        console.log(this.movieObj.tags);
                        this.selectedCheck.push(element.value);

                    }
                }


            }
            console.log(this.selectedCheck);
            return this.selectedCheck;
        },
        updateMovie(e) {
            e.preventDefault()

            const movie = {
                "year": this.movieObj.year,
                "name": this.movieObj.name,
                "cashOut": this.movieObj.cashOut,
                "tag": this.checkboxs(),
                "genre": this.movieObj.genre_id
            };
            axios.post(this.API_URL + "updateMovie/" + this.$route.params.id, movie)
                .then(res => {
                    const success = res.data.success;
                    const movie = res.data.response;
                    if (success) {
                        this.dataApi()
                    }

                }).catch((errors) => {
                    console.log(errors);
                });
            this.$router.push({ name: 'movies' })


        },

    },
    mounted() {
        this.dataApi()
        this.getMovie()
    },

}
</script>

<template>
    <h1>Edit Movie</h1>
    <br>
    <form action="">
        <label for=""> <strong>Name : </strong> </label>
        <input type="text"
            name="name"
            v-model="movieObj.name"> <br> <br>
        <label for="cashOut"> <strong>Cash Out : </strong> </label>
        <input type="integer"
            name="cashOut"
            v-model="movieObj.cashOut"> <br> <br>
        <label for="year"> <strong>Year : </strong> </label>
        <input type="number"
            name="year"
            v-model="movieObj.year"> <br> <br>
        <label for="genre"> <strong>Genre : </strong> </label>
        <select name="genre"
            v-model="movieObj.genre_id">

            <option v-for="genre in genres"
                :value="genre.id"
                :key="genre.id"
                :selected="movieObj.genre_id == genre.id">
                {{ genre.name }}
            </option>


        </select> <br> <br>
        <div>
            <label for=""> <strong>Tags :</strong></label>
            <div class="form-tags"
                v-if="movieObj.tags != undefined && movieObj.tags.length > 0">
                <div v-for="tag in tags"
                    :key="tag.id">
                    <input type="checkbox"
                        class="input"
                        :id="tag.id"
                        :value="tag.id"
                        name=tag
                        :checked="movieTags(tag)">

                    <label for="tag">{{ tag.name }}</label>

                </div>
            </div>

        </div><br>


        <input type="submit"
            @click="updateMovie"
            value="update">
    </form>
</template>

<style></style>
