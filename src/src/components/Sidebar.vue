<template>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <img class="dswd_image"  :src="require('@/assets/assets/img/dswd_final.png')" alt="...">
            <!-- <div class="sidebar-brand-text mx-3 text-dark" >DSWD</div> -->
        </a>

        

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <router-link to="user" class="nav-link">
            <!-- <a class="nav-link" href="user"> -->
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>HomePage</span></router-link>
        </li>




        <!-- Heading -->
        <div class="sidebar-heading">
            Staff
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <!-- <a class="nav-link collapsed" href="table"
                aria-expanded="true" aria-controls="collapseTwo"> -->
                <router-link to="table" class="nav-link" >  
                <i class="fas fa-fw fa-folder"></i>
                <span>Benificiaries Updating</span>
            </router-link>
            <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="buttons.html">Buttons</a>
                    <a class="collapse-item" href="cards.html">Cards</a>
                </div>
            </div> -->
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="utilities-color.html">Colors</a>
                    <a class="collapse-item" href="utilities-border.html">Borders</a>
                    <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div>
        </li>

        

      
        <div class="sidebar-heading">
            Addons
        </div>

        <-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="login.html">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a>
                </div>
            </div>
        </li>

        <-- Nav Item - Charts -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li> -->

        <!-- Nav Item - Tables -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>  -->

        <!-- Divider -->
        

     

        <!-- Sidebar Message -->
      
    </ul>
</template>

<script>


import { onMounted } from 'vue'
    export default {
      
      name: 'Sidebar',

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
      '../vendor/chart.js/Chart.min.js',   
      '../vendor/jquery-easing/jquery.easing.min.js',   
      '../vendor/bootstrap/js/bootstrap.bundle.min.js', 
      '../js/sb-admin-2.min.js',    
      ]);
    });
},
    }
</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i');
@import '@/assets/assets/css/sb-admin-2.min.css';
@import '@/assets/assets/vendor/fontawesome-free/css/all.min.css';
@import '@/assets/assets/css/style.css';
</style >

