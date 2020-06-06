import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const vueRouter = new Router({
    routes: [
        {
            path: '/',
            name: 'teacherRemarks',
            component: () => import('@/components/TeacherRemarks.vue')
        },
        {
            path: '/video',
            name: 'graduation-video',
            component: () => import('@/components/Video.vue')
        },
        {
            path: '/remark',
            name: 'remark',
            component: () => import('@/components/classmatesRemark.vue')
        },
        {
            path: '/heying',
            name: 'heying',
            component: () => import('@/components/HeYing.vue')
        }
    ]
});
export default vueRouter;
