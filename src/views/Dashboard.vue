<template>
    <div id="wrapper">
   <Sidebar/>
   <Header/>

    </div>
    
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  import Header from '../components/admin/header.vue';
        export default {
        components:{Sidebar,Header},
          name: 'Main',
      };
  </script>
  
  <style>
  
  </style>