<template>
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
            <!-- <div class="input-group">
                <input v-model="householdId" type="text" class="form-control bg-light border-0 small " placeholder="Enter HouseHold-id">
                <div class="input-group-append">
                    <button class="btn btn-primary"  @click="searchHousehold">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div> -->
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ userName }}</span>
                    <img class="img-profile rounded-circle"
                        :src="require('@/assets/assets/img/undraw_profile.svg')">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <router-link to=""  @click="logout" class="dropdown-item" >
                      <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                    </router-link>
                </div>
            </li>
        </ul>
    </nav>  
    <div v-if="searchResults.length > 0">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
           
              <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-thin fa-filter"></i>Search Filter </h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr class="text-center">
                              <th class="font-weight-bold">FIRSTNAME</th>
                              <th class="font-weight-bold">MIDDLENAME</th>
                              <th class="font-weight-bold">LASTNAME</th>
                              <th class="font-weight-bold">MUNICIPALITY</th>
                              <th class="font-weight-bold">BARANGAY</th>
                              <th class="font-weight-bold">HH_ID</th>
                              <th class="font-weight-bold">ENTRY_ID</th>
                              <th class="font-weight-bold">SEX</th>
                              <th class="font-weight-bold">AGE</th>
                              <th class="font-weight-bold">BIRTHDAY</th>
                              <th class="font-weight-bold">CLIENT_STATUS</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr v-for="info in searchResults" :key="info.HH_ID"  class="text-center">
                              <td>{{info.FIRST_NAME}}</td>
                              <td>{{info.MIDDLE_NAME}}</td>
                              <td>{{info.LAST_NAME}}</td>
                              <td>{{info.MUNICIPALITY}}</td>
                              <td>{{info.BRGY}}</td>
                              <td>{{info.HH_ID}}</td>
                              <td>{{info.ENTRY_ID}}</td>
                              <td>{{info.SEX}}</td>
                              <td>{{info.AGE}}</td>
                              <td>{{info.BIRTHDAY}}</td>
                              <td>{{info.CLIENT_STATUS}}</td>
                          </tr>                        
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      </div>
</div>

</div>


</template>
   
<script>


import axios from 'axios';
    import { onMounted } from 'vue'
    export default {
      name: 'Header',
      data() {
    return {
      householdId: '',
      searchResults: [],
      // userName: '', 
    
    };
  },
  computed: {
    userName() {
      // Retrieve user name from session storage
      return sessionStorage.getItem('name') || localStorage.getItem('name');
    },
  },
  // console.log(sessionStorage.getItem('name')),
  methods: {
    logout(){
            // const store = useStore();
            // store.commit('setLoggedIn', false);
            localStorage.removeItem('admintoken');
            // Clear local storage or perform any other necessary actions
            localStorage.clear('username');
            this.$router.push('/login');
            // console.log( localStorage.getItem('name'))
          },

    searchHousehold() {
      // Make an AJAX request to your server for searching
      axios.post('/search', { householdId: this.householdId })
        .then(response => {
          console.log('Raw Response:', response);
          this.searchResults = response.data;
        })
        .catch(error => {
          console.log(error);
        });
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
    //   '../vendor/chart.js/Chart.min.js',   
      '../vendor/jquery-easing/jquery.easing.min.js',   
      '../vendor/bootstrap/js/bootstrap.bundle.min.js', 
      '../js/sb-admin-2.min.js',    
    //   '../js/demo/chart-area-demo.js',
    //   '../js/demo/chart-pie-demo.js'
      ]);
    });
},
    }

</script>

<style  >
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
@import '@/assets/assets/css/sb-admin-2.min.css';
@import '@/assets/assets/vendor/fontawesome-free/css/all.min.css';

</style>

