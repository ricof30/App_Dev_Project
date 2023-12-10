<template>
    <div class="container mt-5">
        <div class="row mt-5">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="text-center">
                        <th class="font-weight-bold">ACTIONS</th>
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
                        <th class="font-weight-bold">EXT_NAME</th>
                        <th class="font-weight-bold">REGISTRATION_STATUS</th>
                        <th class="font-weight-bold">HH_SET</th>
                        <th class="font-weight-bold">SOLO_PARENT</th>
                        <th class="font-weight-bold">IP_AFFILIATION</th>
                        <th class="font-weight-bold">PREGNANCY_STATUS</th>
                        <th class="font-weight-bold">HEALTH_FACILITY</th>
                        <th class="font-weight-bold">CHILD_BENE</th>
                        <th class="font-weight-bold">GRADE_LEVEL</th>
                        <th class="font-weight-bold">ATTEND_SCHOOL</th>
                        <th class="font-weight-bold">SCHOOL_NAME</th>
                        <th class="font-weight-bold">MONITORED_EDUC</th>
                        <th class="font-weight-bold">REASON_FOR_NOT_ATTENDING_EDUC</th>
                        <th class="font-weight-bold">DATE_REASON_EDUC</th>
                        <th class="font-weight-bold">MONITORED_HEALTH</th>
                        <th class="font-weight-bold">REASON_FOR_NOT_ATTENDING_HEALTH</th>
                        <th class="font-weight-bold">DATE_REASON_HEALTH</th>
                        <th class="font-weight-bold">DISABILITY_ID</th>
                        <th class="font-weight-bold">DISABILITY_STATUS</th>
                        <th class="font-weight-bold">LRN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="info in deleted"  class="text-center">    
                        <td>
                            <button @click="restoreBeneficiary(info.id)" class="btn btn-primary">Restore</button>
                          </td>               
                        <td>{{info.FIRST_NAME}}</td>
                        <td>{{info.MIDDLE_NAME}}</td>
                        <td>{{info.LAST_NAME}}</td>
                        <td>{{info.MUNICIPALITY}}</td>
                        <td>{{info.BRGY}}</td>
                        <td>{{info.HH_ID}}</td>
                        <td>{{info.ENTRY_ID}}</td>
                        <td>{{info.SEX}}</td>
                        <td>{{info.AGE}}</td>
                        <td>{{info.BIRTHDAY ? new Date(info.BIRTHDAY).toLocaleDateString() : ''}}</td>
                        <td>{{info.CLIENT_STATUS}}</td>
                        <td>{{info.EXT_NAME}}</td>
                        <td>{{info.REGISTRATION_STATUS}}</td>
                        <td>{{info.HH_SET}}</td>
                        <td>{{info.SOLO_PARENT}}</td>
                        <td>{{info.IP_AFFILIATION}}</td>
                        <td>{{info.PREGNANCY_STATUS}}</td>
                        <td>{{info.HEALTH_FACILITY}}</td>
                        <td>{{info.CHILD_BENE}}</td>
                        <td>{{info.GRADE_LEVEL}}</td>
                        <td>{{info.ATTEND_SCHOOL}}</td>
                        <td>{{info.SCHOOL_NAME}}</td>
                        <td>{{info.MONITORED_EDUC}}</td>
                        <td>{{info.REASON_FOR_NOT_ATTENDING_EDUC}}</td>
                        <td>{{info.DATE_REASON_EDUC ? new Date(info.DATE_REASON_EDUC).toLocaleDateString() : ''}}</td>
                        <td>{{info.MONITORED_HEALTH}}</td>
                        <td>{{info.REASON_FOR_NOT_ATTENDING_HEALTH}}</td>
                        <td>{{info.DATE_REASON_HEALTH ? new Date(info.DATE_REASON_HEALTH).toLocaleDateString() : ''}}</td>
                        <td>{{info.DISABILITY_ID}}</td>
                        <td>{{info.DISABILITY_STATUS}}</td>
                        <td>{{info.LRN}}</td>
                    </tr>                        
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</template>

<script>
import axios from 'axios'
import { onMounted } from 'vue'
export default{
    data(){
        return{
            deleted:[],
        }
    },
    created(){
        this.getDeleted();
    },

    methods:{
        async getDeleted(){
            try {
                const inf = await axios.get('getRecycleBin')
                this.deleted = inf.data;
            } catch (error) {
                console.log(error);
            }
        },
        async restoreBeneficiary(entryId) {
            try {
                const response = await axios.post(`restoreBeneficiary/${entryId}`);
                if (response.status === 200) {
                    window.location.reload();
            } 
            } catch (error) {
                console.error(error.response.data.error);
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
}
}
</script>

<style>

</style>