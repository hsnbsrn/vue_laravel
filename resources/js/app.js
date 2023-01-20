import { createApp } from "vue/dist/vue.esm-bundler.js";
import AppComponent from './components/App.vue'
import router from "./router/index";
import axios from "axios";


axios.defaults.baseURL = 'http://localhost:8000/api/';

const app=createApp({
    components:{
        AppComponent,
    }
});


app.use(router)
app.mount('#app')
