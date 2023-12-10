<template>
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      

        <!-- Topbar Search -->
        <!-- <div class="d-flex justify-content-between align-items-start">
           <span class="mr-auto p-2">ENCODER</span> 
          <h3>ENCODER</h3>
        </div> -->
          <!-- <div class="input-group d-flex justify-content-end align-items-end">
            <input v-model="householdId" type="text" class="form-control bg-light border-0 small" placeholder="Enter HouseHold-id" style="margin-left: 70%">
            <div class="input-group-append">
              <button class="btn btn-primary" @click="searchHousehold">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
      -->
        <!-- Topbar Navbar -->
     
    </nav>  
        <div class="card shadow mb-4">
          <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Search Results</h6>
          </div> -->
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr class="text-center ">
                            <th class="font-weight-bold"> ACTION</th>
                            <th class="font-weight-bold"> GRANTEE NAME</th>
                            <th class="font-weight-bold"> MUNICIPALITY</th>
                            <th class="font-weight-bold"> HH_ID</th>
                            <th class="font-weight-bold"> BARANGAY</th>
                            <th class="font-weight-bold"> HH STATUS</th>
                            <th class="font-weight-bold"> VALIDATED</th>
                            <th class="font-weight-bold"> WITH VALIDATION TOOL</th>
                            <th class="font-weight-bold"> WITH UPDATE REQUEST</th>
                            <th class="font-weight-bold"> DATE VALIDATED</th>
                            <th class="font-weight-bold"> NAME OF VALIDATOR</th>
                            <th class="font-weight-bold"> SUBMITTED</th>
                            <th class="font-weight-bold"> DATE SUBMITTED</th>
                            <th class="font-weight-bold"> ENCODED IN PPIS/MCCTIS</th>
                            <th class="font-weight-bold"> REMARKS</th>
                            <th class="font-weight-bold"> DATE ENCODED</th>
                            <th class="font-weight-bold"> ENCODER</th>
                            <th class="font-weight-bold"> TYPES OF UPDATE/S FIELD</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr v-for="info in encoder">
                            <td>
                            <router-link :to="{ name: 'encoderUpdate', params: { entryId: info.ENTRY_ID } }"  class="nav-link" >
                              <button class="btn btn-primary">
                                  <i class="fas fa-edit"></i> Update
                              </button>
                          </router-link>
                            </td>
                            <td>{{info.GRANTEE_NAME}}</td>
                            <td>{{info.MUNICIPALITY}}</td>
                            <td>{{info.HH_ID}}</td>
                            <td>{{info.BRGY}}</td>
                            <td>{{info.HH_STATUS}}</td>
                            <td>{{info.VALIDATED}}</td>
                            <td>{{info.WITH_VALIDATION_TOOL}}</td>
                            <td>{{info.WITH_UPDATE_REQUEST}}</td>
                            <td>{{info.DATE_VALIDATED}}</td>
                            <td>{{info.NAME_OF_VALIDATOR}}</td>
                            <td>{{info.SUBMITTED}}</td>
                            <td>{{info.DATE_SUBMITTED}}</td>
                            <td>{{info.ENCODED_IN_PPIS_MCCTIS}}</td>
                            <td>{{info.REMARKS}}</td>
                            <td>{{info.DATE_ENCODED}}</td>
                            <td>{{info.ENCODER}}</td>
                             <td>{{info.TYPES_OF_UPDATES_FIELD}}</td>
                          </tr>                        
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  
      <!-- <div v-else>
        <p>No results found.</p>
      </div> -->
</div>

</div>


</template>
   
<script>


import axios from 'axios';
    import { onMounted } from 'vue'
    export default {
      name: 'Encoder',
      data() {
    return {
      householdId: '',
      // searchResults: [],
      encoder:[],
    
    };
  },
  
  created(){
            this.getInfo();
        },
  methods: {
    async getInfo(){
                try {
                    const inf = await axios.get('getDataEncoded');
                    console.log('Data from API:', inf.data);
                this.encoder = inf.data;
                } catch (error) {
                    console.log(error);
                }
            }
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
          await loadScriptsInOrder([
    
          '../vendor/jquery/jquery.min.js', 
      '../vendor/chart.js/Chart.min.js',   
      '../vendor/jquery-easing/jquery.easing.min.js',   
      '../vendor/bootstrap/js/bootstrap.bundle.min.js', 
      '../vendor/datatables/jquery.dataTables.min.js',    
      '../js/sb-admin-2.min.js',  
      '../vendor/datatables/dataTables.bootstrap4.min.js',  
      '../js/demo/datatables-demo.js',  
          ]);
    });
},
    }

</script>

<style  >
@import '@/assets/assets/css/sb-admin-2.min.css';
@import '@/assets/assets/vendor/fontawesome-free/css/all.min.css';

</style>

