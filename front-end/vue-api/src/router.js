import { createRouter, createWebHistory } from 'vue-router';
import Movies from './assets/pages/Movies.vue';
import newMovie from './assets/pages/newMovie.vue';
import editMovie from './assets/pages/editMovie.vue';
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
        {
            path: '/editMovie/:id',
            name: 'editMovie',
            component: editMovie
        },
    ]
});
export { router };