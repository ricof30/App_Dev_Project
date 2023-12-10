
<template>
  <div class="container-scroller">
    <Header/>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper pb-0">
          <div>
            <div class="row mt-3">
              <div class="col-md-3">
                <!-- <label for="fileUpload" class="form-label">Choose a file:</label> -->
                <input type="file" @change="handleFileUpload" class="form-control" id="fileUpload" />
              </div>
            </div>
            <div class="table-responsive">
            <table v-if="data" class="table table-bordered mt-3">
              <thead>
                <tr>
                  <!-- <th v-for="(column, columnIndex) in columns" :key="columnIndex">{{ column }}</th> -->
                </tr>
              </thead>
              <tbody>
                <tr v-for="(row, rowIndex) in data" :key="rowIndex">
                  <td v-for="(cell, columnIndex) in row" :key="columnIndex">
                    <div class="row">
                      <div class="col">{{ cell }}</div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Header from '../components/AdminHeader.vue';
import axios from 'axios';
    export default {
      components:{Header},
        name: 'Upload',
        data() {
    return {
      data: null,
      columns: null,
    };
  },
    
 

  methods: {
    async handleFileUpload(event) {
      const file = event.target.files[0];

      const formData = new FormData();
      formData.append('excelFile', file);

      try {
        const response = await axios.post('/upload', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        });

        if (response.status === 200) {
          const excelData = response.data.data;
          this.data = excelData;
          this.columns = this.extractColumns(excelData);
        } else {
          console.error('Error uploading file.');
        }
      } catch (error) {
        console.error(error);
      }
    },

    extractColumns(data) {
      const firstRow = data[0];
      return Object.keys(firstRow);
    },
  },
};
</script>

<style>

</style>