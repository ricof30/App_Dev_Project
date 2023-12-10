<template>
    <div id="wrapper">
   <Sidebar></Sidebar>
           <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                   <Pending/>
        
        </div>
    </div>
</div>


</div>
 

  
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  import Pending from '../components/Pending.vue';
      export default {
        components:{Sidebar,Pending},
          name: 'DashboardTable',
      };
  </script>
  
  <style>
  
  </style>