import { createRouter, createWebHistory } from 'vue-router';
import Movies from './assets/pages/Movies.vue';
import newMovie from './assets/pages/newMovie.vue';
const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'movies',
            component: Movies
        },
        {
            path: '/newMovie',
            name: 'newMovie',
            component: newMovie
        },
    ]
});
export { router };