<template>
    <div id="wrapper">
   <Sidebar></Sidebar>
           <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                   <Chart/>
          <!-- <Result></Result> -->
        </div>
    </div>
</div>


</div>
 

  
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  import Chart from '../components/admin/chart.vue';

      export default {
        components:{Sidebar,Chart},
          name: 'DashboardTable',
      };
  </script>
  
  <style>
  
  </style>