import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Dashboard from '../views/Dashboard.vue'
import Updating_Module from '../views/Updating_Module.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import Admin from '../views/AdminDashboard.vue'
import Table from '../views/DashboardTable.vue'
import Upload from '../views/Upload.vue'
import Validator from '../views/Validator.vue'
import Validators from '../components/Validator.vue'

const routes = [
  {
    path: '/',
    component: HomeView
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/register',
    component: Register
  },
  {
    path: '/update',
    component: Updating_Module
  },
  {
    path: '/user',
    component: Dashboard
  },
  {
    path: '/dashboard',
    component: Admin
  },
  {
    path: '/table',
    name: 'table',
    component: Table
  },
  {
    path: '/upload',
    component: Upload
  },
  // {
  //   path: '/validator/:entryId',
  //   name: 'validate',
  //   component: Validators,
  //   props: true,
  // },
  {
    path: '/validate/:entryId',
    name: 'validate', // Add this line
    component: Validator,
    props: true, // Enable passing route params as props
    // props: route => ({ details: route.params.details || {} })
 
  },
  {
    path: '/about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
