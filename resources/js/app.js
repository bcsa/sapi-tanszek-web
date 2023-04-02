require('./bootstrap');

import Vue from 'vue';
import Vuetify from '@js/Plugins/vuetify/script';
import stringHelpers from './Helpers/string'
import vueRoutes from '@js/routes.js'
import VueRouter from 'vue-router';
import RoundSlider from 'vue-round-slider-simple'
import 'vuejs-google-maps/dist/vuejs-google-maps.css'

import bootstrap from 'bootstrap'

import * as VueGoogleMaps from "vue2-google-maps" // Import package

Vue.config.productionTip = false
Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyBZEktUDzqx5sA6EJsNe53HRw5RA_l4eEQ",
        libraries: "places"
    }
});

Vue.prototype.$helpers = {
    string: stringHelpers
}

Vue.use(VueRouter)
Vue.use(RoundSlider)

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
            showApprovalDialog: false,
            isSystemLoading: false,
        }
    },

    methods: {
        setSystemLoading(loading) {
            this.isSystemLoading = loading
        },

        trackClick(category, action, label) {
            if (this.isProduction) {
                window.sendEvent(category, label, action)
            }
        },
    }
})
