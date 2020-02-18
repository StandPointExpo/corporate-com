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
// Vue.component('portfolio-component', require('./components/PortfolioComponent.vue').default);

import PortfolioComponent from './components/PortfolioComponent.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Headroom from 'headroom.js';
import LightBox from 'lightbox2';
import VueLazyLoad from 'vue-lazyload';
import VueAnalytics from 'vue-analytics'

Vue.use(VueAnalytics, {
    id: 'UA-158589039-1'
})
Vue.use(VueLazyLoad, {
    preLoad: 1.3,
    attempt: 1,
    loading: '/images/ajax-loader.gif',
    throttleWait: 500,
    // adapter: {
    //     loading (listender, Init) {
    //         console.log(Init)
    //         console.log(listender)
    //         console.log('loading')
    //     },
    //     error (listender, Init) {
    //         console.log('error')
    //     }
    // }
});

const app = new Vue({
    el: '#app',
    components: {
      'portfolio-component': PortfolioComponent,
    },
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
        },
        downloadPresentation(){
            this.$ga.event({
                eventCategory: 'Presentation',
                eventAction: 'download',
                eventLabel: 'Standpoint Presentation'
            })
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


