<template>
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="index.html">
                <img class="dswd_image" style="height: 50px" :src="require('@/assets/assets/img/dswd_final.png')" alt="...">
                <!-- <span class="font-12 d-block font-weight-light">DSWD</span> -->
              </a>
              <a class="navbar-brand brand-logo-mini" href="index.html"><img style="height: 50px; width: 50px" :src="require('@/assets/assets/img/dswd_final.png')" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">    
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                      <img class="img-profile rounded-circle"
                      :src="require('@/assets/assets/img/user icon.png')">
                    </div>
                    <div class="nav-profile-text">
                      <p class="text-black font-weight-semibold m-0">{{ userName }}</p>
                      <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <!-- <a class="dropdown-item" href="login">
                      <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a> -->
                      <router-link to=""  @click="logout" class="dropdown-item" >
                        <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                      </router-link>
                  </div>
                </li>
              </ul>
              
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
          </div>
        </nav>
        <nav class="bottom-navbar">
          <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <router-link to="userdashboard" class="nav-link" >
                  <i class="mdi mdi-compass-outline menu-icon"></i>
                  <span class="menu-title">Home Page</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="updating" class="nav-link" >
                  <i class="mdi mdi-monitor-dashboard menu-icon"></i>
                  <span class="menu-title">Beneficiary Updating Module</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="encoder" class="nav-link" >
                  <i class="mdi mdi-contacts menu-icon"></i>
                  <span class="menu-title">Encoder</span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="upload" class="nav-link" >
                  <i class="mdi mdi-clipboard-text menu-icon"></i>
                  <span class="menu-title">Open Excel File </span>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="generate" class="nav-link" style="margin-top: 4px;" >
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title" style="margin-top">Generate Report</span>
                </router-link>
              </li>
            </ul>
          </div>
        </nav>
      </div>
</template>
<script>
    
  
    import { onMounted } from 'vue'
        export default {
          
          name: 'AdminHeader',
          computed: {
          userName() {
            return localStorage.getItem('name');
          },
        },
        methods:{
          logout(){
            localStorage.removeItem('token');
            localStorage.clear('name');
            this.$router.push('/adminLogin');
          
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
          '../admin/vendors/js/vendor.bundle.base.js',   
          '../admin/vendors/jquery-bar-rating/jquery.barrating.min.js',   
          '../admin/vendors/chart.js/Chart.min.js', 
          '../admin/vendors/flot/jquery.flot.js',   
          '../admin/vendors/flot/jquery.flot.resize.js',   
          '../admin/vendors/flot/jquery.flot.categories.js',   
          '../admin/vendors/flot/jquery.flot.fillbetween.js',   
          '../admin/vendors/flot/jquery.flot.stack.js',   
          '../admin/js/jquery.cookie.js',   
          '../admin/js/off-canvas.js',  
          '../admin/js/hoverable-collapse.js',  
          '../admin/js/misc.js',  
          '../admin/js/settings.js',  
          '../admin/js/todolist.js',  
      
          ]);
        });
    },
        }
    
    </script>
    
    <style>
    
    @import '@/assets/assets/admin/vendors/mdi/css/materialdesignicons.min.css';
    @import '@/assets/assets/admin/vendors/flag-icon-css/css/flag-icon.min.css';
    @import '@/assets/assets/admin/vendors/css/vendor.bundle.base.css';
    @import '@/assets/assets/admin/vendors/jquery-bar-rating/css-stars.css';
    @import '@/assets/assets/admin/vendors/font-awesome/css/font-awesome.min.css';
    @import '@/assets/assets/admin/css/demo_2/style.css';
 

    </style>
    