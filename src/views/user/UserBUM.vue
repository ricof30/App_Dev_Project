<template>
    <div class="container-scroller">
        <Header/>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
              <div class="content-wrapper pb-0">
                <BUM/>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../../components/AdminHeader.vue';
import BUM from '../../components/BUM.vue'
      export default {
        components:{Header,BUM},
          name: 'UserBUM',
      };
</script>

<style>

</style>