import { createRouter, createWebHistory } from 'vue-router'


const routes = [
   {
      path: '/my',
      children: [
         {
            path: '',
            component: () => import ('../Pages/Dashboard.vue'),
         },
         {
            path: 'opportunities',
            name: 'Opportunities',
            component: () => import ('../Pages/Opportunities.vue'),
         },
         {
            path: 'opportunity/id/:id',
            name: 'Opportunity',
            props: true,
            component: () => import ('../Pages/Opportunity.vue'),
         },
         {
            path: 'portfolio',
            component: () => import ('../Pages/Portfolio/Portfolio.vue'),
         },
      ]
   },
   {
      path: '/:catchAll(.*)',
      name: 'NotFound',
      component: () => import ('../Pages/NotFound.vue'),
   },
]

const router = createRouter({
   linkExactActiveClass: 'is-active',
   history: createWebHistory(),
   routes
})

export default router