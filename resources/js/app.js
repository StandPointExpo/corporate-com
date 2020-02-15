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
            langMenu: false,
            closePrivacyBlock: false
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
    },
    created: function(){
        if(this.getCookie('close_privacy')) this.closePrivacyBlock = true;
    },
    methods: {
        setCookie: function(name, value, props) {

            props = props || {}
            var exp = props.expires
            if (typeof exp == "number" && exp) {
                var d = new Date()
                d.setTime(d.getTime() + exp*1000)
                exp = props.expires = d
            }

            if(exp && exp.toUTCString) { props.expires = exp.toUTCString() }
            value = encodeURIComponent(value)
            var updatedCookie = name + "=" + value

            for(var propName in props){
                updatedCookie += "; " + propName
                var propValue = props[propName]
                if(propValue !== true){ updatedCookie += "=" + propValue }
            }
            document.cookie = updatedCookie
        },
        getCookie: function(name){
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        },
        deleteCookie: function(name) {
            this.setCookie(name, "", {
                'max-age': -1
            })
        },
        closePrivacyBlockAction: function(){
            this.closePrivacyBlock = true
        }
    },
    watch:{
        closePrivacyBlock: function(){
            if(this.closePrivacyBlock == true){
                this.setCookie('close_privacy', 'true', {'expires': 31536000});
            }else{
                this.deleteCookie('close_privacy');
            }
        }
    },
});


