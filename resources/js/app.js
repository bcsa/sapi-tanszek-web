// import FileDrop from "./Helpers/FileDrop.vue";

require('./bootstrap');

import Vue from 'vue';
import Vuetify from '@js/Plugins/vuetify/script';
import stringHelpers from './Helpers/string'
import vueRoutes from '@js/routes.js'
import VueRouter from 'vue-router';
import _ from 'lodash'
import vuescroll from 'vuescroll'

// Vue.component('file-drop', FileDrop)

Vue.config.productionTip = false

Vue.prototype._ = _

Vue.prototype.$helpers = {
    string: stringHelpers
}

Vue.use(VueRouter)

Vue.use(vuescroll)

const router = new VueRouter({
    routes: vueRoutes,
    mode: 'history'
})

let app = new Vue({
    el: "#app",
    router,
    vuetify: Vuetify,

    mixins: window.mixins,

    data() {
        return {

        }
    },

    methods: {

    }
})
