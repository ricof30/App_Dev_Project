<template>
  <div class="container-scroller">
    <Header />
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper pb-0">
          <div class="row justify-content-center align-items-center mb-3">
            <div class="col-md-3">
              <label>Start Date:</label>
              <input type="date" v-model="startDate" class="form-control" />
            </div>
            <div class="col-md-3">
              <label>End Date:</label>
              <input type="date" v-model="endDate" class="form-control" />
            </div>
            <div class="col-md-3 mt-7">
              <button @click="fetchData" class="btn btn-primary">Fetch Data</button>
              <button @click="exportData" class="btn btn-success ml-2">Export Data</button>
            </div>
          </div>
          <div class="row  mt-5">
            <div class="col-md-12">
              <div class="card-body">
                <div class="table-responsive">
                    <table  v-if="fetchedData"  class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                          <tr>
                            <th v-for="(value, key) in fetchedData[0]" :key="key">{{ key }}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(row, rowIndex) in fetchedData" :key="rowIndex">
                            <td v-for="(cell, columnIndex) in row" :key="columnIndex">{{ cell }}</td>
                          </tr>     
                        </tbody>
                    </table>
              <!-- <div v-else>
                <p name=></p>
              </div> -->
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


     <script>
import axios from 'axios';
import Header from '../../components/AdminHeader.vue';
export default {
    components:{Header},
  data() {
    return {
      startDate: null,
      endDate: null,
      fetchedData: null,
    };
  },
  methods: {
    async fetchData() {
      // Prepare filter criteria
      const criteria = {
        startDate: this.startDate,
        endDate: this.endDate,
      };

      try {
        // Make a GET request to fetch data based on the date range
        const response = await axios.get('/fetch', { params: criteria });
        this.fetchedData = response.data.data; // Assuming the response has a "data" property
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    },

    async exportData() {
      // Prepare filter criteria
      const criteria = {
        startDate: this.startDate,
        endDate: this.endDate,
      };

      try {
        // Make a GET request to the backend export endpoint with filter criteria
        const response = await axios.get(`/generate?${new URLSearchParams(criteria).toString()}`, {
          responseType: 'blob',
        });

        // Create a Blob URL for the exported data
        const url = window.URL.createObjectURL(new Blob([response.data]));

        // Create a link element to trigger the download
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'exported_data.csv');

        // Append the link to the DOM and trigger the download
        document.body.appendChild(link);
        link.click();

        // Remove the link from the DOM
        document.body.removeChild(link);
      } catch (error) {
        console.error('Error exporting data:', error);
      }
    },
  },
};
</script>
<style scoped>
.table-wrapper {
  /* Adjust the max height as needed */ 
  overflow-y: auto;
}
</style>