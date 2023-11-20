  <template>
      <div class="container mt-5 ">
          <h2 class="mb-10 text-center text-primary font-weight-bold">Update Information Form</h2>
        
          <form id="updateForm">
            <!-- <input type="text" id="FULLNAME" name="FULLNAME" :value="`${details.FIRST_NAME} ${details.MIDDLE_NAME} ${details.LAST_NAME}`" />
            <input type="text" id="municipality" name="municipality" v-model="details.MUNICIPALITY" />
            <input type="text" id="hhid" name="hhid" v-model="details.HH_ID" />
            <input type="text" id="brgy" name="brgy" v-model="details.BRGY" />
            <input type="text" id="hh_status" name="hh_status" v-model="details.MEMBER_STATUS" /> -->
            <!-- <div v-if="details && details.ENTRY_ID"> -->
        
              
              <input type="hidden" v-model="details.ENTRY_ID  " id="entryId"  class="form-control"   placeholder="entryId"/>
              <input type="hidden" id="fullname" class="form-control" v-model="details.FIRST_NAME"/>
              <input type="hidden" id="municipality" class="form-control" v-model="details.MUNICIPALITY"/>
              <input type="hidden" id="hhId" class="form-control" v-model="details.HH_ID"/>
              <input type="hidden" id="brgy" class="form-control" v-model="details.BRGY"/>
              <input type="hidden" id="memberStatus" class="form-control" v-model="details.MEMBER_STATUS"/>    <!-- </div> -->
      
              <div class="row">
                  <div class="col-md-4">
                    <div class="mb-9">
                      <label for="validated" class="form-label">Validated:</label>
                      <select id="validated" name="validated" class="form-select">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                    </div>
            
                    <div class="mb-4">
                      <label for="typeOfUpdate" class="form-label">Type of Update:</label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-check ms-3">
                            <input type="checkbox" id="basicInfo" name="typeOfUpdate" value="basicInfo" class="form-check-input">
                            <label for="basicInfo" class="form-check-label">Basic Information</label>
                          </div>
                          <div class="form-check ms-3">
                            <input type="checkbox" id="changeAddress" name="typeOfUpdate" value="changeAddress" class="form-check-input">
                            <label for="changeAddress" class="form-check-label">Change Address</label>
                          </div>
                          <div class="form-check ms-3">
                            <input type="checkbox" id="educationInfo" name="typeOfUpdate" value="educationInfo" class="form-check-input">
                            <label for="educationInfo" class="form-check-label">Education Information</label>
                        </div>
                        <div class="form-check ms-3">
                          <input type="checkbox" id="ipAffiliation" name="typeOfUpdate" value="ipAffiliation" class="form-check-input">
                          <label for="ipAffiliation" class="form-check-label">IP Affiliation</label>
                        </div>
                        <div class="form-check ms-3">
                          <input type="checkbox" id="memberStatus" name="typeOfUpdate" value="memberStatus" class="form-check-input">
                          <label for="memberStatus" class="form-check-label">Member Status</label>
                        </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-check ms-3">
                            <input type="checkbox" id="additionalMember" name="typeOfUpdate" value="additionalMember" class="form-check-input">
                            <label for="additionalMember" class="form-check-label">Additional Member</label>
                          </div>
                          <div class="form-check ms-3">
                            <input type="checkbox" id="granteeChange" name="typeOfUpdate" value="granteeChange" class="form-check-input">
                            <label for="granteeChange" class="form-check-label">Change of Grantee</label>
                          </div>
                          <div class="form-check ms-3">
                              <input type="checkbox" id="healthInformation" name="typeOfUpdate" value="healthInformation" class="form-check-input">
                              <label for="healthInformation" class="form-check-label">Health Information</label>
                            </div>
                            <div class="form-check ms-3">
                              <input type="checkbox" id="childSelection" name="typeOfUpdate" value="childSelection" class="form-check-input">
                              <label for="childSelection" class="form-check-label">Child Selection/Replacement</label>
                            </div>
                            <div class="form-check ms-3">
                              <input type="checkbox" id="householdStatus" name="typeOfUpdate" value="householdStatus" class="form-check-input">
                              <label for="householdStatus" class="form-check-label">Household Status</label>
                            </div>
                          <!-- Add more checkboxes as needed -->
                        </div>
                      </div>
                    </div>
                    
                    <div class="mb-9">
                      <label for="submitted" class="form-label">Submitted:</label>
                      <select id="submitted" name="submitted" class="form-select">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
            <div class="mb-9">
              <label for="accomplished" class="form-label">With Accomplished Validation Tool:</label>
              <select id="accomplished" name="accomplished" class="form-select form-control w-300 " style="max-width: 500px;">
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
      
            <div class="mb-9">
              <label for="dateValidated" class="form-label">Date Validated:</label>
              <input type="text" id="dateValidated" name="dateValidated" data-input class="form-control  w-300 " style="max-width: 500px;">
            </div>
      
            <div class="mb-9">
              <label for="dateSubmitted" class="form-label">Date Submitted:</label>
              <input type="text" id="dateSubmitted" name="dateSubmitted" data-input class="form-control w-300 " style="max-width: 500px;">
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-9">
              <label for="updateRequest" class="form-label">With Update Request:</label>
              <select id="updateRequest" name="updateRequest" class="form-select form-control w-300 " style="max-width: 500px;">
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
      
            <div class="mb-9">
              <label for="nameOfValidator" class="form-label">Name of Validator:</label>
              <select id="nameOfValidator" name="nameOfValidator" class="form-select form-control w-300 " style="max-width: 500px;">
                <option value="validator1">Rico Fontecilla</option>
                <option value="validator2">Chene Xi Manalo</option>
                <option value="validator3">Jerwin Castillo</option>
                <!-- Add more validator options as needed -->
              </select>
            </div>
      
            <div class="mb-9">
              <label for="encodedInPPIS_MCCT" class="form-label">Encoded in PPIS_MCCT IS:</label>
              <select id="encodedInPPIS_MCCT" name="encodedInPPIS_MCCT" class="form-select form-control w-300 " style="max-width: 500px;">
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
          </div>
            <button type="submit" class="btn btn-primary">Submit</button>
      </div>
          </form>
        </div>
    
    </template>

    <script>
  import axios from 'axios';
  import flatpickr from 'flatpickr';
      import 'flatpickr/dist/flatpickr.min.css';

  export default {
    props: ['entryId'],
    data() {
      return {
        details: {}, // Initialize details as an empty object
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
      async editDetails(entryId) {
        try {
          const response = await axios.get(`/getDetails/${entryId}`);
          this.details = response.data[0]; // Assuming your response is an array with a single object

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

    <style scoped>
      /* Add your custom styles here */
      /* Use the "scoped" attribute to ensure styles only apply to this component */
    </style>
    