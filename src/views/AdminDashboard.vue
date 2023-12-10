<template>
    <div class="container-scroller">
   <!-- <Sidebar></Sidebar> -->
   <Header></Header>
    </div>
  </template>
  
  <script>

  import Header from '../components/AdminHeader.vue';
  import Chart from '../components/admin/chart.vue';
      export default {
        components:{Header,Chart},
          name: 'Main',
      };
  </script>
  
  <style>
  
  </style>