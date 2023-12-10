<template>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <img class="dswd_image"  :src="require('@/assets/assets/img/dswd_final.png')" alt="...">
            <!-- <div class="sidebar-brand-text mx-3 text-dark" >DSWD</div> -->
        </a>

        

        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
            <router-link to="admindashboard" class="nav-link">
            <!-- <a class="nav-link" href="user"> -->
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>HomePage</span></router-link>
        </li>
        <hr class="sidebar-divider text-secondary">
        <div class="sidebar-heading">
            Staff
        </div>
        <li class="nav-item">

                <router-link to="pending" class="nav-link" >  
                <i class="fas fa-fw fa-folder"></i>
                <span>Pending Approval</span>
            </router-link>
            <router-link to="approved" class="nav-link" >  
                <i class="fas fa-fw fa-folder"></i>
                <span>Approved Staff</span>
            </router-link>
        </li>
        <hr class="sidebar-divider text-secondary">
        <div class="sidebar-heading">
            Beneficiaries
        </div>
        <li class="nav-item">
                <router-link to="list" class="nav-link" >  
                <i class="fas fa-fw fa-folder"></i>
                <span>List of Beneficiaries</span>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="recyclebin" class="nav-link" >  
            <i class="fas fa-fw fa-folder"></i>
            <span>Deleted Beneficiaries</span>
        </router-link>
    </li>
        <!-- <li class="nav-item"> -->
            <!-- <a class="nav-link collapsed" href="table"
                aria-expanded="true" aria-controls="collapseTwo"> -->
                <!-- <router-link to="validate" class="nav-link" >  
                <i class="fas fa-fw fa-folder"></i>
                <span>Validator</span>
            </router-link> -->
            <!-- <router-link to="upload" class="nav-link" >  
                <i class="fas fa-fw fa-folder"></i>
                <span>File Upload</span>
            </router-link> -->
        <!-- </li> -->

      

    
      
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

