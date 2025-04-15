import '../sass/app.scss';
import './core/bootstrap';
import './dashboard/article/index.js'
import $ from  'jquery';
import { createApp } from 'vue';


window.$ = window.jQuery = $;

const app = createApp({});
window.Vue = app;
