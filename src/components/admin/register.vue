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
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                  </div>
                  <form class="user" @submit.prevent="register"  style="max-width: 400px; width: 100%;">
                    <!-- Full Name Input -->
                    <div class="form-group row">
                      <label for="fullname">Fullname:</label>
                      <input v-model="name" type="text" class="form-control ">
                   
                    </div>
                    <!-- Email Input -->
                    <div class="form-group row">
                      <label for="email">Email:</label>
                      <input v-model="email" type="email" class="form-control">
                    
                    </div>

                    <!-- Password Input -->
                    <div class="form-group row">
                      <label for="password">Password:</label>
                      <input v-model="password" type="password" class="form-control ">
                    </div>
                    <!-- Repeat Password Input -->
               
                    <!-- Register Button -->
                    <button class="btn btn-primary btn-user btn-block">Register Account</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <router-link to="login">Already have an account? Login!</router-link>
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
import axios from 'axios';
import { onMounted } from 'vue';
export default{

    data() {
        return {
          name: '',
          password: '',
          email: '',
        };
      },
      methods: {
        async register() {
         


            try {
              const response = await axios.post("adminregister", {
                name: this.name,
                password: this.password,
                email: this.email,
              });
                    console.log(this.FullName);
              console.log(response.data);
              this.$router.push('/adminlogin');
              // Handle the response accordingly, e.g., redirect to another page
            } catch (error) {
              console.error(error);
             
              
            }
          
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