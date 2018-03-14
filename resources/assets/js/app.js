
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import CompaniesIndex from './components/companies/CompaniesIndex.vue';
import CompaniesCreate from './components/companies/CompaniesCreate.vue';
import CompaniesEdit from './components/companies/CompaniesEdit.vue';

import ProfileIndex from './components/profiles/ProfileIndex.vue';
import ProfileEdit from './components/profiles/ProfileEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            companiesIndex: CompaniesIndex
        },
        
    },
    {
    	path: '/',
    	components: {
            profileIndex: ProfileIndex
        },
    },
    {path: '/admin/companies/create', component: CompaniesCreate, name: 'createCompany'},
    {path: '/admin/companies/edit/:id', component: CompaniesEdit, name: 'editCompany'},
    {path: '/admin/profile/edit/:id', component: ProfileEdit, name: 'editProfile'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
