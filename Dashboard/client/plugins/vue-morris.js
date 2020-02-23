// Do not forget to import raphael
import Raphael from 'raphael/raphael'

import { DonutChart } from 'vue-morris'
import Vue from 'vue'
global.Raphael = Raphael
Vue.component('morris-donut-chart', DonutChart)

// More info on package website: https://github.com/bbonnin/vue-morris
