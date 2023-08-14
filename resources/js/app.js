import './bootstrap';
// import '../css/app.css';

import { createApp } from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue';

import App from './Components/App.vue';

import router from './Router';

const app = createApp(App)
app.use(router);
app.mount('#app');

app.use( CKEditor );
app.component('ck-editor');
