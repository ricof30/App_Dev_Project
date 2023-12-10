<template>
    <div id="wrapper">
   <!-- <Sidebar></Sidebar> -->
           <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                  <div class="container mt-5 ">
                    <h2 class="mb-10 text-center text-primary font-weight-bold">Encoder Update Information</h2>
                    <form id="updateForm" @submit.prevent="insert">
                        <input type="hidden" v-model="details.ENTRY_ID  " id="entryId"  class="form-control" placeholder="entryId" />
                        <input type="hidden" id="fullname"  class="form-control" v-model="details.GRANTEE_NAME"/>
                        <input type="hidden" id="municipality"  class="form-control" v-model="details.MUNICIPALITY"/>
                        <input type="hidden" id="hhId"  class="form-control" v-model="details.HH_ID"/>
                        <input type="hidden" id="brgy"  class="form-control" v-model="details.BRGY"/>
                        <input type="hidden" id="memberStatus"  class="form-control" v-model="details.HH_STATUS"/>    <!-- </div> -->
                        <!-- <div class="mt-5">
                          <h3 class="text-primary font-weight-bold">Details:</h3>
                          <pre>{{ details }}</pre>
                        </div> -->
                        <div class="row">
                            <div class="col-md-4">
                              <div class="mb-9">
                                <label for="validated" class="form-label">Validated:</label>
                                <input type="text" id="fullname"  class="form-control" v-model="details.VALIDATED" readonly/>
                              </div>
                              <div class="mb-9">
                                <label for="submitted" class="form-label">Submitted:</label>
                                <input type="text" id="fullname"  class="form-control" v-model="details.SUBMITTED" readonly/>
                              </div>
                              <div class="mb-9">
                                <label for="encodedInPPIS_MCCT" class="form-label">Encoded in PPIS_MCCT IS:</label>
                                <input type="text" id="fullname"  class="form-control" v-model="details.ENCODED_IN_PPIS_MCCTIS" readonly/>
                              </div>
                            </div>
                            <div class="col-md-4">
                      <div class="mb-9">
                        <label for="accomplished" class="form-label">With Accomplished Validation Tool:</label>
                        <input type="text" id="fullname"  class="form-control" v-model="details.WITH_VALIDATION_TOOL" readonly/>
                      </div>
                
                      <div class="mb-9">
                        <label for="dateValidated" class="form-label">Date Validated:</label>
                        <input type="text"  class="form-control" v-model="details.DATE_VALIDATED" readonly  style="max-width: 500px;">
                      </div>
                
                      <div class="mb-9">
                        <label for="dateSubmitted" class="form-label">Date Submitted:</label>
                        <input type="text"    class="form-control" v-model="details.DATE_SUBMITTED" readonly  style="max-width: 500px;">
                      </div>
                      <div class="mb-9">
                        <label for="nameOfValidator" class="form-label">Name of Validator:</label>
                        <input type="text" id="fullname"  class="form-control" v-model="details.NAME_OF_VALIDATOR" readonly/>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="mb-9">
                        <label for="updateRequest" class="form-label">With Update Request:</label>
                        <input type="text" id="fullname"  class="form-control" v-model="details.WITH_UPDATE_REQUEST" readonly/>
                      </div>
                
                      <div class="mb-9">
                        <label for="nameOfEncoder" class="form-label">Name of Encoder:</label>
                        <select  v-model="nameOfEncoder" class="form-select form-control w-300 " style="max-width: 500px;">
                          <option value="Rico Fontecilla">Rico Fontecilla</option>
                          <option value="Chene Xi Manalo">Chene Xi Manalo</option>
                          <option value="Jerwin Castillo">Jerwin Castillo</option>
                        </select>
                      </div>
                
                    
                      <div class="mb-9">
                        <label for="remarks" class="form-label">Remarks:</label>
                        <input type="text" id="remarks"  class="form-control" v-model="remarks"/>
                      </div>
                      <div class="mb-9">
                        <label for="dateValidated" class="form-label">Date Encoded:</label>
                        <input type="text"  id="dateValidated"  v-model="dateEncoded" data-input class="form-control  w-300 " style="max-width: 500px;">
                      </div>
                    </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                    </form>
                  </div>
        </div>
    </div>
</div>


</div>
 

  
  </template>
  
  <script>
    import axios from 'axios';
  import flatpickr from 'flatpickr';
      import 'flatpickr/dist/flatpickr.min.css';
  import Sidebar from '../components/Sidebar.vue';
  import Header from '../components/Header.vue';
      export default {
        components:{Sidebar,Header},
          name: 'DashboardTable',

          props: ['entryId'],
    data() {
      return {
        details: {}, 
        remarks: "",
        nameOfEncoder: "",
        dateEncoded: "",
      };
    },
    created() {
      const entryId = this.$route.params.entryId;
    console.log('Received entryId:', entryId);
    if (entryId) {
      this.editDetails(entryId);
    }
  },
    mounted() {
          flatpickr("#dateValidated", { dateFormat: "Y-m-d" });
          flatpickr("#dateSubmitted", { dateFormat: "Y-m-d" });
        },
    methods: {
      async insert(){
       
          try {
            const ins = await axios.post(`update/${this.details.id}`, {
                id:this.details.id,
                remarks: this.remarks,
                nameOfEncoder: this.nameOfEncoder,
                dateEncoded: this.dateEncoded,
              });
              if (ins.status === 200) {
                this.$router.push('/encoder');
                  
                }  else {
                // Handle other cases if needed
                console.error('Insertion was not successful:', ins);
       
              }
          } catch (error) {
            console.error('Error inserting data:', error);
          }
      },
     
      async editDetails(entryId) {
        try {
          const response = await axios.get(`/getEncoderDetails/${entryId}`);
          this.details = response.data[0]; 
          if (this.details && this.details.ENTRY_ID) {
            // Now you can access details.ENTRY_ID and other properties
            console.log('Details from CodeIgniter:', JSON.parse(JSON.stringify(this.details)));
          } else {
            console.error('Invalid details received from CodeIgniter.');
          }
        } catch (error) {
          console.error('Error fetching details:', error);
        }
      },
    },
      };
  </script>
  
  <style>
  
  </style>