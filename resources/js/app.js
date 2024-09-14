import './bootstrap';
import '../css/app.css';

import Vue from 'vue';
import Todo from './components/Todo.vue';

new Vue({
    el: '#app',
    components: { Todo }
});

