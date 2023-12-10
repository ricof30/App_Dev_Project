import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Dashboard from '../views/Dashboard.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import Upload from '../views/Upload.vue'
import Pending from '../views/Pending.vue'
import UserDashboard from '../views/user/UserDashboard.vue'
import Approved from '../views/Approved.vue'
import UserBUM from '../views/user/UserBUM.vue'
import UserValidator from '../views/user/UserValidator.vue'
import UserEncoder from '../views/user/UserEncoder.vue'
import Generate from '../views/user/Generate.vue'
import Chart from '../views/AdminChart.vue'
import BeneficiaryList from '../views/AdminList.vue'
import Deleted from '../views/AdminDeleted.vue'
import AdminLogin from '../components/admin/login.vue'
import Forgot from '../components/admin/forgot_password.vue'
import UpdatePassword from '../components/admin/update_password.vue'
import UserUpdateEncoder from '../views/user/UserUpdateEncoder.vue'
import AdminResetPass from '../components/Admin_ResetPass.vue'
import AdminUpdatePass from '../components/Admin_UpdatePass.vue'



const routes = [
  {
    path: '/',
    component: HomeView
  },
  {
    path: '/forgot',
    component: Forgot
  },
  {
    path: '/updatePassword',
    component: UpdatePassword 
  },
  {
    path: '/resetPass',
    component: AdminResetPass 
  },
  {
    path: '/updatePass',
    component: AdminUpdatePass 
  },
  {
    path: '/chart',
    component: Chart,
    meta: { adminAuth: true } 
  },
  {
    path: '/adminlogin',
    component: AdminLogin
  },
  {
    path: '/encoderupdate/:entryId',
    name: 'encoderUpdate', 
    component: UserUpdateEncoder,
    props: true, 
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
    path: '/userdashboard',
    component: UserDashboard,
    meta: { requiresAuth: true } 
  },
  {
    path: '/list',
    component: BeneficiaryList,
    meta: { adminAuth: true } 
  },
  {
    path: '/recyclebin',
    component: Deleted,
    meta: { adminAuth: true } 
  },
  {
    path: '/updating',
    component: UserBUM,
    meta: { requiresAuth: true } 
  },
  {
    path: '/encoder',
    component: UserEncoder,
    meta: { requiresAuth: true } 
  },
  {
    path: '/admindashboard',
    component: Dashboard,
    meta: { adminAuth: true } 
  },
  {
    path: '/pending',
    component: Pending,
    meta: { adminAuth: true } 
  },
  {
    path: '/approved',
    component: Approved,
    meta: { adminAuth: true } 
  },
  {
    path: '/generate',
    component: Generate,
       meta: { requiresAuth: true } 
  },
  {
    path: '/upload',
    component: Upload,
    meta: { requiresAuth: true } 
  },
  {
    path: '/validate/:entryId',
    name: 'validate', 
    component: UserValidator,
    meta: { requiresAuth: true } ,
    props: true, 
  },
  {
    path: '/about',
    component: () => import('../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

function isAuthenticated() {
  // Check if the user is authenticated (e.g., check for the presence of a valid token)
  return localStorage.getItem('token') !== null;
}

function isAuthenticate() {
  // Check if the user is authenticated (e.g., check for the presence of a valid token)
  return localStorage.getItem('admintoken') !== null;
}

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !isAuthenticated()) {
    next('/login'); // Redirect to login if not authenticated
  } else if (to.meta.adminAuth && !isAuthenticate()) {
    next('/adminlogin'); // Redirect to login if not authenticated
  } else {
    next();
  }

});



export default router
