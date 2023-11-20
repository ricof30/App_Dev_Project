<template>
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
             
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                  
                <form class="form-inline mr-auto w-100 navbar-search" action="post">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                        id="navbar-search-input" placeholder="Search" aria-label="search"
                            aria-describedby="search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>
                    </div>
                </form>
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
               <img :src="require('../assets/assets/admin/images/faces/face1.jpg')" alt="image" />
                    </div>
                    <div class="nav-profile-text">
                      <p class="text-black font-weight-semibold m-0"> Olson jass </p>
                      <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
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
                <a class="nav-link" href="index.html">
                  <i class="mdi mdi-compass-outline menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-monitor-dashboard menu-icon"></i>
                  <span class="menu-title">UI Elements</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                  <ul class="submenu-item">
                    <li class="nav-item">
                      <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdown</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/forms/basic_elements.html">
                  <i class="mdi mdi-clipboard-text menu-icon"></i>
                  <span class="menu-title">Forms</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/icons/mdi.html">
                  <i class="mdi mdi-contacts menu-icon"></i>
                  <span class="menu-title">Icons</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/charts/chartjs.html">
                  <i class="mdi mdi-chart-bar menu-icon"></i>
                  <span class="menu-title">Charts</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/tables/basic-table.html">
                  <i class="mdi mdi-table-large menu-icon"></i>
                  <span class="menu-title">Tables</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://www.bootstrapdash.com/demo/plus-free/documentation/documentation.html" class="nav-link" target="_blank">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Docs</span></a>
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
    