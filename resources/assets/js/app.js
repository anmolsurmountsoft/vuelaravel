
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
window.Vue.use(VueRouter);

// import UsersIndex from './components/users/UsersIndex.vue';
// import UsersCreate from './components/users/UsersCreate.vue';
// import UsersEdit from './components/users/UsersEdit.vue';

import StudentsIndex from './components/students/StudentsIndex.vue';
import StudentsCreate from './components/students/StudentsCreate.vue';
import StudentsEdit from './components/students/StudentsEdit.vue';
//Vue.http.headers.common['Authorization'] = 'Basic YWRtaW5AZXhhbXBsZS5vcmc6QWRtaW5AMTIzNA==';

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const routes = [
    {
        path: '/',
        components: {
            studentsIndex: StudentsIndex
        }
    },
    {path: '/students/create', component: StudentsCreate, name: 'createStudents'},
    {path: '/students/edit/:id', component: StudentsEdit, name: 'editStudents'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
