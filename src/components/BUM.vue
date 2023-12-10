
    <template>
      <div v-if="successMessage" class="text-center text-success mt-3">
        {{ $store.state.successMessage }}
      </div>
        <div id="content-wrapper" class="d-flex flex-column">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow text-center">
                    <!-- <h3 class="text-primary ">Benificiares Updating Module</h3> -->
                    <div class="input-group d-flex justify-content-end align-items-end">
                      <input v-model="householdId" type="text" class="form-control bg-light border-0 small " placeholder="Enter HouseHold-id" style="margin-left: 70%">
                      <div class="input-group-append">
                          <button class="btn btn-primary"  @click="searchHousehold">
                              <i class="fas fa-search fa-sm"></i>
                          </button>
                      </div>
                  </div>
           </nav>  
    </div>
    <!-- <div v-if="$store.state.alertMessage">
      <p>{{ $store.state.alertMessage }}</p>
    </div> -->
    <div v-if="searchResults.length > 0">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Search Results</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="font-weight-bold" >ACTION</th>
                            <th class="font-weight-bold">ENTRY_ID</th>
                            <th class="font-weight-bold">FULLNAME</th>
                            <th class="font-weight-bold">BIRTHDAY</th>
                            <th class="font-weight-bold">AGE</th>
                            <th class="font-weight-bold">SEX</th>
                            <th class="font-weight-bold">RELATIONSHIP</th>
                            <th class="font-weight-bold">CLIENT STATUS</th>
                            <!-- <th class="font-weight-bold">CHILD SELECTION</th> -->
                            <th class="font-weight-bold">CAPABLE GRANTEE</th>        
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr v-for="info in searchResults" :key="info.HH_ID" class="text-center">
                            <td>
                              <router-link :to="{ name: 'validate', params: { entryId: info.ENTRY_ID } }"  class="nav-link" >
                                <button class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Update
                                </button>
                            </router-link>
                            </td>
                            <td>{{info.ENTRY_ID}}</td>
                            <td>{{ `${info.LAST_NAME} ${info.FIRST_NAME} ${info.MIDDLE_NAME}`.trim() }}</td>
                            <td>{{info.BIRTHDAY.split(' ')[0]}}</td>
                            <td>{{info.AGE}}</td>
                            <td>{{info.SEX}}</td>
                            <td>{{info.RELATION_TO_HH_HEAD}}</td>
                            <td>{{info.CLIENT_STATUS}}</td>
                            <td>{{info.GRANTEE}}</td>
                        </tr>                        
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
    </div>

    <!-- <div v-else>
      <p>No results found.</p>
    </div> -->


    </template>
       
    <script>
    import axios from 'axios';
    import { onMounted } from 'vue'
    export default { 
      name: 'BUM',
      data() {
    return {
      householdId: '',
      searchResults: [],
    };
  },

//   created() {
//   this.editDetails(/* pass the necessary details here */);
// },
  methods: {
    //for searching function
    searchHousehold() {
      // Make an AJAX request to your server for searching
      axios.post('/search', { householdId: this.householdId })
        .then(response => {
          // console.log('Raw Response:', response);
          this.searchResults = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
  },
 

    //for loading js
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
}
    };
    </script>
    
    <style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
    @import url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i');
    @import '@/assets/assets/css/sb-admin-2.min.css';
    @import '@/assets/assets/vendor/fontawesome-free/css/all.min.css';
    @import '@/assets/assets/css/style.css';
    @import '@/assets/assets/vendor/datatables/dataTables.bootstrap4.min.css';

    </style>
    
    

