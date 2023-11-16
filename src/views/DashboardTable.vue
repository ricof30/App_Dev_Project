<template>
    <div id="wrapper">
   <Sidebar></Sidebar>
           <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <BUM></BUM>
          <!-- <Result></Result> -->
        </div>
    </div>
</div>


</div>
 

  
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  import Header from '../components/Header.vue';
  import Tables from '../components/Tables.vue';
  import BUM from '../components/BUM.vue';
  import Result from '../components/Result.vue';
      export default {
        components:{Sidebar,Header,Tables,BUM,Result},
          name: 'DashboardTable',
      };
  </script>
  
  <style>
  
  </style>