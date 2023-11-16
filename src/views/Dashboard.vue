<template>
    <div id="wrapper">
   <Sidebar></Sidebar>
   <Header></Header>
   
    </div>
    <!-- <Tables></Tables> -->
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  import Header from '../components/Header.vue';
  import Tables from '../components/Tables.vue';
      export default {
        components:{Sidebar,Header,Tables},
          name: 'Main',
      };
  </script>
  
  <style>
  
  </style>