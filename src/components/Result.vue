<!-- views/search_view.vue -->
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
                        <tr v-for="info in minsu_victoria_roster_list_as_of_october_2023" :key="info.HH_ID">
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
  export default {
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
                    const inf = await axios.get('search');
                this.minsu_victoria_roster_list_as_of_october_2023 = inf.data;
                } catch (error) {
                    console.log(error);
                }
            }
        },
    
  };
  </script>
  
  <style scoped>
  /* Add your component-specific styles here */
  </style>
  