<template>
    <body class="bg-gradient-primary">

        <div class="container containers">
    
            <!-- Outer Row -->
            <div class="row justify-content-center">
    
                <div class="col-xl-10 col-lg-12 col-md-9">
    
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block ">
                                    <img :src="require('@/assets/assets/img/dswd.png')" alt="" class="pic">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <div v-if="errorMessage" class="text-center text-danger mt-3">
                                            {{ errorMessage }}
                                          </div>
                                        <form class="user" @submit.prevent="validateAndLogin">
                                            <div class="form-group">
                                                <input v-model="email" type="email" class="form-control form-control-user" required placeholder="Enter Email Address...">
                                            </div>
                                            <div class="form-group">
                                                <input v-model="password" type="password" class="form-control form-control-user" placeholder="Password">
                                            </div>  
                                            <button  type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                              </button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                          <router-link to="forgot">Forgot Password?</router-link>
                                        </div>
                                        <div class="text-center">
                                            <router-link to="register">Create an Account</router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
        </div>
    </body>
</template>

<style>
    @import '@/assets/assets/css/sb-admin-2.min.css';
    @import '@/assets/assets/vendor/fontawesome-free/css/all.min.css';
    @import '@/assets/assets/css/style.css';
</style>

<script>
 

    import axios from 'axios'   
    import { onMounted } from 'vue'
    export default {
      name: 'Login',

      data() {
    return {
      email: '',
      password: '',
      errorMessage: '',
    };
  },
  methods: {
    
    
    validateAndLogin() {
        // console.log(response.data.message)
      if (!this.email || !this.password) {
        this.errorMessage = 'Email and password are required';
      } else {
        this.login();
      }
    },
    login() {
      const data = {
        email: this.email,
        password: this.password,
      };

      axios
        .post('/login', JSON.stringify(data), {
          headers: {
            'Content-Type': 'application/json',
          },
        })
        .then((response) => {
          if (response.data.message === 'Login successful') {
            // console.log(response.data.message)
            this.$router.push('/userdashboard');
            localStorage.setItem('name', response.data.name);
            localStorage.setItem('token', response.data.token);
          
          }
        })
        .catch((error) => {
            console.error(error.response.data);
                if ( error.response.data ) {
                    this.errorMessage = error.response.data;
                } else {
                    this.errorMessage = 'Invalid email or password, try again!';
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
