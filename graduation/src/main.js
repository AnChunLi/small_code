import Vue from 'vue'
import App from './App.vue'
import router from './router'

import preview from 'vue-photo-preview'
import 'vue-photo-preview/dist/skin.css'
Vue.use(preview)


// import teacherRemarks from '@/components/TeacherRemarks.vue'
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
