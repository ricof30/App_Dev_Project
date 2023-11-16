import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Dashboard from '../views/Dashboard.vue'
import Updating_Module from '../views/Updating_Module.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import Admin from '../views/AdminDashboard.vue'
import Table from '../views/DashboardTable.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/register',
    name: 'register',
    component: Register
  },
  {
    path: '/update',
    name: 'Updating',
    component: Updating_Module
  },
  {
    path: '/user',
    name: 'Main',
    component: Dashboard
  },
  {
    path: '/dashboard',
    name: 'AdminDashboard',
    component: Admin
  },
  {
    path: '/table',
    name: 'DashboardTable',
    component: Table
  },
  {
    path: '/about',
    name: 'about',
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
