<template>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Search Results</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>FIRSTNAME</th>
                            <th>MIDDLENAME</th>
                            <th>LASTNAME</th>
                            <th>MUNICIPALITY</th>
                            <th>BARANGAY</th>
                            <th>HH_ID</th>
                            <th>ENTRY_ID</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>BIRTHDAY</th>
                            <th>CLIENT_STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="info in minsu_victoria_roster_list_as_of_october_2023" >
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
</template>

<script>


import axios from 'axios'
import { onMounted } from 'vue'
    export default {
      
      name: 'Tables',

    
        data(){
            return{
                minsu_victoria_roster_list_as_of_october_2023:[],
            }
        },

        created(){
            this.getInfo();
        },
        methods: {
            async getInfo(){
                try {
                    const inf = await axios.get('getData');
                this.minsu_victoria_roster_list_as_of_october_2023 = inf.data;
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
        // await loadScript('../vendor/chart.js/Chart.min.js'); 
        await loadScript('../vendor/jquery/jquery.min.js'); 
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
<style>
@import url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i');
@import '@/assets/assets/css/sb-admin-2.min.css';
@import '@/assets/assets/vendor/fontawesome-free/css/all.min.css';
@import '@/assets/assets/css/style.css';
@import '@/assets/assets/vendor/datatables/dataTables.bootstrap4.min.css';
</style >


