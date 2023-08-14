import { createRouter, createWebHistory } from 'vue-router'

const routes = [
   {
      path: '/admin',
      children: [
         {
            path: 'dashboard',
            component: () => import ('../Pages/Dashboard.vue'),
         },
         {
            path: 'opportunities',
            component: () => import ('../Pages/Opportunities.vue'),
         },
         {
            path: 'opportunity',
            component: () => import ('../Pages/JobForm.vue'),
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
   history: createWebHistory(),
   routes
})

export default router