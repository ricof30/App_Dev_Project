<template>
    <div class="container-scroller">
        <Header/>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
              <div class="content-wrapper pb-0">
                <Search/> 
              </div>
            </div>
        </div>
    </div>

  </template>

<script>
import Header from '../../components/AdminHeader.vue';
import Search from '../../components/Search.vue'
      export default {
        components:{Header,Search},
          name: 'UserDashboard',
      };
</script>

<style>

</style>