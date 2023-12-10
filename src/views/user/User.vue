<template>
    <div class="container-scroller">
        <Header/>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
              <div class="content-wrapper pb-0">
              </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../components/AdminHeader.vue';
import Encoder from '../components/Encoder.vue'
      export default {
        components:{Header},
          name: 'UserDashboard',
      };
</script>

<style>

</style>