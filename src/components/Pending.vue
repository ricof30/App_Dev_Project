
<template>
       
    <div class="container mt-5">
        <h2 class="text-center mb-4 font-weight-bold">PENDING STAFF</h2>

        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center" style="font-family: Poppins;">NAME</th>
                    <th scope="col" class="text-center" style="font-family: Poppins;">EMAIL</th>
                    <th scope="col" class="text-center" style="font-family: Poppins;">ROLE</th>
                    <th scope="col" class="text-center" style="font-family: Poppins;">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="info in staff" class="text-center">
                    <td style="font-family: Poppins;">{{ info.name }}</td>
                    <td style="font-family: Poppins;">{{ info.email }}</td>
                    <td style="font-family: Poppins;">{{ info.roles }}</td>
                    <td style="font-family: Poppins;">
                        <button @click="approveStaff(info.id)" class="btn btn-success btn-sm">Approve</button>
                        <button @click="rejectStaff(info.id)" class="btn btn-danger btn-sm">Reject</button>
                    </td>
                </tr>          
            </tbody>
        </table>
    </div>

  <!-- <div v-else>
    <p>No results found.</p>
  </div> -->


  </template>
     
  <script>
  import axios from 'axios';
  import { onMounted } from 'vue'
  export default {
    name: 'Pending',
    data() {
  return {
    staff:[],
  };
},

        created(){
            this.getInfo();
        },
methods: {
    async getInfo(){
                try {
                    const inf = await axios.get('getPending');
                this.staff = inf.data;
                } catch (error) {
                    console.log(error);
                }
            },

    async approveStaff(staffId) {
      try {
        const response = await axios.post(`/approveStaff/${staffId}`); // Replace with your actual CI4 API endpoint
        if (response.status === 200) {
          // Remove the approved staff from the local array
          this.staff = this.staff.filter((staff) => staff.id !== staffId);
        }
      } catch (error) {
        console.error('Error approving staff:', error);
      }
    },

    async rejectStaff(staffId) {
      try {
        const response = await axios.post(`/rejectStaff/${staffId}`); // Replace with your actual CI4 API endpoint
        if (response.status === 200) {
          // Remove the rejected staff from the local array
          this.staff = this.staff.filter((staff) => staff.id !== staffId);
        }
      } catch (error) {
        console.error('Error rejecting staff:', error);
      }
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
  };
  </script>
  
  <style>
  @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
  @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
  @import url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i');
  @import '@/assets/assets/css/sb-admin-2.min.css';
  @import '@/assets/assets/vendor/fontawesome-free/css/all.min.css';
  @import '@/assets/assets/css/style.css';
  @import '@/assets/assets/vendor/datatables/dataTables.bootstrap4.min.css';

  </style>
  
  

