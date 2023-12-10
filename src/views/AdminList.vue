<template>
    <div id="wrapper">
   <Sidebar></Sidebar>
           <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                   <List/>
          <!-- <Result></Result> -->
        </div>
    </div>
</div>


</div>
 

  
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  import List from '../components/admin/list.vue';

      export default {
        components:{Sidebar,List},
          name: 'DashboardTable',
      };
  </script>
  
  <style>
  
  </style>