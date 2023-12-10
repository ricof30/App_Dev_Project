<template>
    <div id="wrapper">
   <Sidebar></Sidebar>
           <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                   <Approved/>
          <!-- <Result></Result> -->
        </div>
    </div>
</div>


</div>
 

  
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  import Approved from '../components/Approved.vue';

      export default {
        components:{Sidebar,Approved},
          name: 'DashboardTable',
      };
  </script>
  
  <style>
  
  </style>