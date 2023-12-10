<template>
  <body class="bg-gradient-primary">
    <div class="container d-flex justify-content-center align-items-center  h-100">
      <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row ">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">AdminPanel</h1>
                </div>
                <div v-if="errorMessage" class="text-center text-danger mt-3">
                  {{ errorMessage }}
                </div>
                <form class="user" @submit.prevent="validateLogin"  style="max-width: 400px; width: 100%;">
                  <div class="form-group row">
                    <label for="fullname">Username:</label>
                    <input v-model="name" type="text" class="form-control ">
                  </div>
                  <div class="form-group row">
                    <label for="password">Password:</label>
                    <input v-model="password" type="password" class="form-control ">
                  </div>
                  <button type="submit"  class="btn btn-primary btn-user btn-block">Login</button>
                </form>
                <hr>
                <div class="text-center">
                  <router-link to="resetPass">Forgot Password?</router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </template>
<script>
 import axios from 'axios'   
    import { onMounted } from 'vue'
export default{
  name:'login',
  
  data() {
    return {
      name: '',
      password: '',
      errorMessage: '',
    };
  },
  methods: {
    
    
    validateLogin() {
        // console.log(response.data.message)
      if (!this.name || !this.password) {
        this.errorMessage = 'Email and password are required';
      } else {
        this.login();
      }
    },
    login() {
      const data = {
        name: this.name,
        password: this.password,
      };

      axios
        .post('/adminlogin', JSON.stringify(data), {
          headers: {
            'Content-Type': 'application/json',
          },
        })
        .then((response) => {
          if (response.data.message === 'Login successful') {
            this.$router.push('/admindashboard');
            localStorage.setItem('username', response.data.name);
            localStorage.setItem('admintoken', response.data.token);
          }
        })
        .catch((error) => {
            console.error(error.response.data);
                if ( error.response.data ) {
                    this.errorMessage = error.response.data;
                } else {
                    this.errorMessage = 'Invalid Username or password, try again!';
                }
                this.clearErrorMessageAfterDelay(3000);
            });
    },
    clearErrorMessageAfterDelay(delay) {
    setTimeout(() => {
      this.errorMessage = '';
    }, delay);
  },
  },

  setup() {
    async function loadScript(src) {
      return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = src;
        script.onload = resolve;
        script.onerror = reject;
        document.head.appendChild(script);
      });
    }

    async function loadScriptsInOrder(scriptUrls) {
      for (const url of scriptUrls) {
        await loadScript(url);
      }
    }

    onMounted(async () => {
        // await loadScript('../vendor/chart.js/Chart.min.js'); 
        await loadScript('../vendor/jquery/jquery.min.js'); 
      await loadScriptsInOrder([
      '../vendor/jquery/jquery.min.js',   
      '../vendor/jquery-easing/jquery.easing.min.js',   
      '../vendor/bootstrap/js/bootstrap.bundle.min.js', 
      '../js/sb-admin-2.min.js',    
      ]);
    });
},
}
</script>

<style>
    @import '@/assets/assets/css/sb-admin-2.min.css';
    @import '@/assets/assets/vendor/fontawesome-free/css/all.min.css';
    @import '@/assets/assets/css/style.css';
</style>