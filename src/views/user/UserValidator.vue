<template>
    <div class="container-scroller">
        <Header/>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
              <div class="content-wrapper pb-0">
                <Validator/>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../../components/AdminHeader.vue';
import Validator from '../../views/Validator.vue'
      export default {
        components:{Header,Validator},
          name: 'UserValidator',
      };
</script>

<style>

</style>