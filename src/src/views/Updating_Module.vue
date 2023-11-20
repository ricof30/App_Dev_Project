<template>
    <div id="wrapper">
   <Sidebar></Sidebar>
    <BUM></BUM>
    <Result></Result>
    </div>
  </template>
  
  <script>
  import Sidebar from '../components/Sidebar.vue';
  import BUM from '../components/BUM.vue';
  import Result from '../components/Result.vue';
      export default {
        components:{Sidebar,BUM,Result},
          name: 'Updating',
      };
  </script>
  
  <style>
  
  </style>