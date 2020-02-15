/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Headroom from 'headroom.js';
import LightBox from 'lightbox2';

const app = new Vue({
    el: '#app',
    data: function(){
        return {
            mobileMenu: false,
            langMenu: false
        }
    },
    mounted: function(){
        let headerMenu  = document.querySelector('nav');
        let headroom = new Headroom(headerMenu, {
            "offset": 105,
            "tolerance": 5,
            "classes": {
                "initial": "headroom",
                "pinned": "headroom--pinned",
                "unpinned": "headroom--unpinned"
            }
        });
        headroom.init();

        LightBox.option({
            'resizeDuration': 200,
            'wrapAround': false
        })

    }
});


