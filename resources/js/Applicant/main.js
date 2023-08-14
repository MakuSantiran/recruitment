window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { createApp } from 'vue';
import MainApplicant from './Components/MainApplicant';
import Registration from './Components/Registration';

import router from './Router';  

const app = createApp({})

app.use(router);

app.component('main-app', MainApplicant)
app.component('registration', Registration)
app.mount('#app');