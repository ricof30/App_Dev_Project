<template>
    <div id="wrapper">
   <!-- <Sidebar></Sidebar> -->
           <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                  <div class="container mb-3">
                    <h2 class="mb-10 text-center text-primary font-weight-bold">Validator Update Information </h2>
                    <form id="updateForm" @submit.prevent="insert">
                        <input type="hidden" v-model="details.ENTRY_ID  " id="entryId"  class="form-control" placeholder="entryId" />
                        <input type="hidden" id="fullname"  class="form-control" v-model="full_name"/>
                        <input type="hidden" id="municipality"  class="form-control" v-model="details.MUNICIPALITY"/>
                        <input type="hidden" id="hhId"  class="form-control" v-model="details.HH_ID"/>
                        <input type="hidden" id="brgy"  class="form-control" v-model="details.BRGY"/>
                        <input type="hidden" id="memberStatus"  class="form-control" v-model="details.MEMBER_STATUS"/>   
                        <div class="row">
                            <div class="col-md-4">
                              <div class="mb-9">
                                <label for="validated" class="form-label">Validated:</label>
                                <select  v-model="validated" class="form-select">
                                  <option value="YES">Yes</option>
                                  <option value="NO">No</option>
                                </select>
                              </div>

                              <div class="mb-4">
                                <label for="typeOfUpdate" class="form-label">Type of Update:</label>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-check ms-3">
                                      <input type="checkbox"  v-model="typeOfUpdate['basicInfo']" value="basicInfo" class="form-check-input">
                                      <label for="basicInfo" class="form-check-label">Basic Information</label>
                                    </div>
                                    <div class="form-check ms-3">
                                      <input type="checkbox"  v-model="typeOfUpdate['changeAddress']" value="changeAddress" class="form-check-input">
                                      <label for="changeAddress" class="form-check-label">Change Address</label>
                                    </div>
                                    <div class="form-check ms-3">
                                      <input type="checkbox"  v-model="typeOfUpdate['educationInfo']" value="educationInfo" class="form-check-input">
                                      <label for="educationInfo" class="form-check-label">Education Information</label>
                                  </div>
                                  <div class="form-check ms-3">
                                    <input type="checkbox"  v-model="typeOfUpdate['ipAffiliation']" value="ipAffiliation" class="form-check-input">
                                    <label for="ipAffiliation" class="form-check-label">IP Affiliation</label>
                                  </div>
                                  <div class="form-check ms-3">
                                    <input type="checkbox"  v-model="typeOfUpdate['memberStatus']" value="memberStatus" class="form-check-input">
                                    <label for="memberStatus" class="form-check-label">Member Status</label>
                                  </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-check ms-3">
                                      <input type="checkbox"  v-model="typeOfUpdate['additionalMember']" value="additionalMember" class="form-check-input">
                                      <label for="additionalMember" class="form-check-label">Additional Member</label>
                                    </div>
                                    <div class="form-check ms-3">
                                      <input type="checkbox"  v-model="typeOfUpdate['granteeChange']" value="granteeChange" class="form-check-input">
                                      <label for="granteeChange" class="form-check-label">Change of Grantee</label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input type="checkbox"  v-model="typeOfUpdate['healthInformation']" value="healthInformation" class="form-check-input">
                                        <label for="healthInformation" class="form-check-label">Health Information</label>
                                      </div>
                                      <div class="form-check ms-3">
                                        <input type="checkbox"  v-model="typeOfUpdate['childSelection']" value="childSelection" class="form-check-input">
                                        <label for="childSelection" class="form-check-label">Child Selection/Replacement</label>
                                      </div>
                                      <div class="form-check ms-3">
                                        <input type="checkbox"  v-model="typeOfUpdate['householdStatus']" value="householdStatus" class="form-check-input">
                                        <label for="householdStatus" class="form-check-label">Household Status</label>
                                      </div>
                                    <!-- Add more checkboxes as needed -->
                                  </div>
                                </div>
                              </div>

                              <div class="mb-9">
                                <label for="submitted" class="form-label">Submitted:</label>
                                <select  v-model="submitted" class="form-select">
                                  <option value="YES">Yes</option>
                                  <option value="NO">No</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                      <div class="mb-9">
                        <label for="accomplished" class="form-label">With Accomplished Validation Tool:</label>
                        <select  v-model="accomplished" class="form-select form-control w-300 " style="max-width: 500px;">
                          <option value="YES">Yes</option>
                          <option value="NO">No</option>
                        </select>
                      </div>
                
                      <div class="mb-9">
                        <label for="dateValidated" class="form-label">Date Validated:</label>
                        <input type="text"  id="dateValidated"  v-model="dateValidated" data-input class="form-control  w-300 " style="max-width: 500px;">
                      </div>
                
                      <div class="mb-9">
                        <label for="dateSubmitted" class="form-label">Date Submitted:</label>
                        <input type="text"  id="dateSubmitted"  v-model="dateSubmitted" data-input class="form-control w-300 " style="max-width: 500px;">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="mb-9">
                        <label for="updateRequest" class="form-label">With Update Request:</label>
                        <select  v-model="updateRequest" class="form-select form-control w-300 " style="max-width: 500px;">
                          <option value="YES">Yes</option>
                          <option value="NO">No</option>
                        </select>
                      </div>
                
                      <div class="mb-9">
                        <label for="nameOfValidator" class="form-label">Name of Validator:</label>
                        <select  v-model="nameOfValidator" class="form-select form-control w-300 " style="max-width: 500px;">
                          <option value="Rico Fontecilla">Rico Fontecilla</option>
                          <option value="Chene Xi Manalo">Chene Xi Manalo</option>
                          <option value="Jerwin Castillo">Jerwin Castillo</option>
                          <!-- Add more validator options as needed -->
                        </select>
                      </div>
                
                      <div class="mb-9">
                        <label for="encodedInPPIS_MCCT" class="form-label">Encoded in PPIS_MCCT IS:</label>
                        <select  v-model="encoded" class="form-select form-control w-300 " style="max-width: 500px;">
                          <option value="YES">Yes</option>
                          <option value="NO">No</option>
                        </select>
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
        full_name: '',
        nameOfValidator: "",
        validated: "",
        typeOfUpdate: [],
        submitted: "",
        accomplished:"",
        dateValidated:"",
        dateSubmitted:"",
        updateRequest:"",
        encoded:"",
      };
    },
    created() {
      const entryId = this.$route.params.entryId;
    console.log('Received entryId:', entryId);
    if (entryId) {
      this.editDetails(entryId);
    }
  },
  watch: {
  details: {
    handler() {
      // Concatenate first name, middle name, and last name
      this.full_name = `${this.details.FIRST_NAME} ${this.details.MIDDLE_NAME} ${this.details.LAST_NAME}`.trim();
    },
    deep: true, // Watch for changes inside details object
  },
},

    mounted() {
          flatpickr("#dateValidated", { dateFormat: "Y-m-d" });
          flatpickr("#dateSubmitted", { dateFormat: "Y-m-d" });
        },
    methods: {
      async insert(){
        const selectedTypeOfUpdate = Object.keys(this.typeOfUpdate).filter(key => this.typeOfUpdate[key]);

        console.log(selectedTypeOfUpdate)
          try {
              const ins = await axios.post("insert",{
                ENTRY_ID: this.details.ENTRY_ID,
                MUNICIPALITY: this.details.MUNICIPALITY,
                HH_ID: this.details.HH_ID,
                BRGY: this.details.BRGY,
                MEMBER_STATUS: this.details.MEMBER_STATUS,
                full_name: this.full_name,
                validated: this.validated,
                typeOfUpdate: selectedTypeOfUpdate,
                submitted: this.submitted,
                accomplished: this.accomplished, 
                dateValidated: this.dateValidated,
                dateSubmitted: this.dateSubmitted,
                updateRequest: this.updateRequest,
                Validator: this.nameOfValidator,
                encoded: this.encoded,
              });
              if (ins.status === 200) {
            // If successful, navigate to the /table route
            this.$router.push('/updating');
        } else {
            // Handle other cases if needed
            console.error('Insertion was not successful:', ins);

            // Check if the error is due to an existing grantee name
            if (ins.status === 400 || ins.data.error === ('Grantee Name already exists.')) {
            this.$router.push('/updating');
}
        }
    } catch (error) {
        console.error('Error inserting data:', error);
        // this.$router.push('/updating');
    }
      },
    
      async editDetails(entryId) {
        try {
          const response = await axios.get(`/getDetails/${entryId}`);
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