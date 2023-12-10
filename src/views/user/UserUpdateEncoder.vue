<template>
    <div class="container-scroller">
        <Header/>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
              <div class="content-wrapper pb-0">
                <EncoderUpdate/>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../../components/AdminHeader.vue';
import EncoderUpdate from '../../components/EncoderUpdate.vue'
      export default {
        components:{Header,EncoderUpdate},
          name: 'UserValidator',
      };
</script>

<style>

</style>