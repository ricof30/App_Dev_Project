<template>
    <div id="wrapper">
   <Sidebar></Sidebar>
           <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                   <Deleted/>
          <!-- <Result></Result> -->
        </div>
    </div>
</div>


</div>
 

  
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  import Deleted from '../components/admin/deleted.vue';

      export default {
        components:{Sidebar,Deleted},
          name: 'DashboardTable',
      };
  </script>
  
  <style>
  
  </style>