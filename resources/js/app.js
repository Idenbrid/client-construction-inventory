// import './bootstrap';
import '../sass/app.scss'
import {
    createApp
} from 'vue';
import Router from "./Router/index"
import Layout from './Layouts/index.vue';

const app = createApp();
app.use(Router);
app.component('default', Layout);
app.mount('#app');