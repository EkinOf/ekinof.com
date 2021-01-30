import Vue from 'vue';
import Buefy from 'buefy';
import axios from 'axios';
import { DateTime } from "luxon";
import PostList from './components/PostList';

Vue.use(Buefy, {
    defaultIconPack: 'fa'
});

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.info('CSRF token not loaded.');
}

Vue.component('v-post-list', PostList);

window.axios = axios;
window.DateTime = DateTime;
window.Vue = Vue;
