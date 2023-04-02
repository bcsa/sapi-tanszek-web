import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

const opts = {
    breakpoint: {
        thresholds: {
            xs: 0,
            sm: 476,
            md: 668,
            lg: 1000,
            xl: 1300
        }
    },
}

let v = new Vuetify(opts)

Vue.use(v)

export default v
