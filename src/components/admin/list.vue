    <template>
        <div class="container mt-5">
            <div class="row mt-5">

                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" ref="editModal">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Beneficiary</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form  @submit.prevent="update" >
                        <div class="modal-body">
                        <div class="mb-3">
                            <label for="editRegion" class="form-label">Region:</label>
                            <input type="text"  v-model="editedInfo.REGION" class="form-control" id="editRegion">
                        </div>
                        <div class="mb-3">
                            <label for="editProvince" class="form-label">Province:</label>
                            <input type="text"  v-model="editedInfo.PROVINCE" class="form-control" id="editProvince">
                        </div>
                        <div class="mb-3">
                            <label for="editMunicipality" class="form-label">Municipality:</label>
                            <input type="text"  v-model="editedInfo.MUNICIPALITY" class="form-control" id="editMunicipality">
                        </div>
                        <div class="mb-3">
                            <label for="editFName" class="form-label">First Name:</label>
                            <input type="text"  v-model="editedInfo.FIRST_NAME" class="form-control" id="editFName">
                        </div>
                        <div class="mb-3">
                            <label for="editMName" class="form-label">Middle Name:</label>
                            <input type="text"  v-model="editedInfo.MIDDLE_NAME" class="form-control" id="editMName">
                        </div>
                        <div class="mb-3">
                            <label for="editFName" class="form-label">Last Name:</label>
                            <input type="text"  v-model="editedInfo.LAST_NAME" class="form-control" id="editFName">
                        </div>
                        <div class="mb-3">
                            <label for="editBday" class="form-label">Birthday:</label>
                            <input type="text"  v-model="editedInfo.BIRTHDAY" class="form-control" id="editBday">
                        </div>
                        <div class="mb-3">
                            <label for="editAge" class="form-label">Age:</label>
                            <input type="text"  v-model="editedInfo.AGE" class="form-control" id="editAge">
                        </div>
                        <div class="mb-3">
                            <label for="editSex" class="form-label">Sex:</label>
                            <input type="text"  v-model="editedInfo.SEX" class="form-control" id="editSex">
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close" @click="closeModal">Close</button>
                        <button type="submit" class="btn btn-primary" @click="saveChanges">Save changes</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>

                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" ref="addModal">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="addModalLabel">Add Beneficiary</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form @submit.prevent="addBeneficiary">
                          <div class="modal-body">
                            <!-- Add your form fields for adding a beneficiary here -->
                            <div class="mb-3">
                              <label  class="form-label">Region:</label>
                              <input type="text" v-model="newBeneficiary.REGION" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Province:</label>
                                <input type="text" v-model="newBeneficiary.PROVINCE" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Municipality  :</label>
                                <input type="text" v-model="newBeneficiary.MUNICIPALITY" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Barangay:</label>
                                <input type="text" v-model="newBeneficiary.BRGY" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">First Name:</label>
                                <input type="text" v-model="newBeneficiary.FNAME" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Middle Name:</label>
                                <input type="text" v-model="newBeneficiary.MNAME" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Last Name:</label>
                                <input type="text" v-model="newBeneficiary.LNAME" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Birthday:</label>
                                <input type="text" id="dateValidated"  v-model="newBeneficiary.BDAY" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Age:</label>
                                <input type="text" v-model="newBeneficiary.AGE" class="form-control" >
                              </div>
                               <div class="mb-3">
                                <label  class="form-label">Sex:</label>
                                <input type="text" v-model="newBeneficiary.SEX" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Client Status:</label>
                                <input type="text" v-model="newBeneficiary.CLIENT" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Member Status:</label>
                                <input type="text" v-model="newBeneficiary.MEMBER" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Grantee:</label>
                                <input type="text" v-model="newBeneficiary.GRANTEE" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Relation to HH Head:</label>
                                <input type="text" v-model="newBeneficiary.RELATION" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Registration Status:</label>
                                <input type="text" v-model="newBeneficiary.REGISTRATION" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">School Name:</label>
                                <input type="text" v-model="newBeneficiary.SCHOOL" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Grade Level:</label>
                                <input type="text" v-model="newBeneficiary.GRADE" class="form-control" >
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Beneficiary</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

        <div class="card-body">
            <button @click="openAddModal" class="btn btn-success">
                <i class="fas fa-plus"></i> Add Beneficiary
              </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="font-weight-bold">ACTIONS</th>
                            <th class="font-weight-bold">REGION</th>
                            <th class="font-weight-bold">PROVINCE</th>
                            <th class="font-weight-bold">MUNICIPALITY</th>
                            <th class="font-weight-bold">BARANGAY</th>
                            <th class="font-weight-bold">FIRSTNAME</th>
                            <th class="font-weight-bold">MIDDLENAME</th>
                            <th class="font-weight-bold">LASTNAME</th>
                            <th class="font-weight-bold">HH_ID</th>
                            <th class="font-weight-bold">ENTRY_ID</th>
                            <th class="font-weight-bold">SEX</th>
                            <th class="font-weight-bold">AGE</th>
                            <th class="font-weight-bold">BIRTHDAY</th>
                            <th class="font-weight-bold">CLIENT_STATUS</th>
                            <th class="font-weight-bold">EXT_NAME</th>
                            <th class="font-weight-bold">REGISTRATION_STATUS</th>
                            <th class="font-weight-bold">HH_SET</th>
                            <th class="font-weight-bold">SOLO_PARENT</th>
                            <th class="font-weight-bold">IP_AFFILIATION</th>
                            <th class="font-weight-bold">PREGNANCY_STATUS</th>
                            <th class="font-weight-bold">HEALTH_FACILITY</th>
                            <th class="font-weight-bold">CHILD_BENE</th>
                            <th class="font-weight-bold">GRADE_LEVEL</th>
                            <th class="font-weight-bold">ATTEND_SCHOOL</th>
                            <th class="font-weight-bold">SCHOOL_NAME</th>
                            <th class="font-weight-bold">MONITORED_EDUC</th>
                            <th class="font-weight-bold">REASON_FOR_NOT_ATTENDING_EDUC</th>
                            <th class="font-weight-bold">DATE_REASON_EDUC</th>
                            <th class="font-weight-bold">MONITORED_HEALTH</th>
                            <th class="font-weight-bold">REASON_FOR_NOT_ATTENDING_HEALTH</th>
                            <th class="font-weight-bold">DATE_REASON_HEALTH</th>
                            <th class="font-weight-bold">DISABILITY_ID</th>
                            <th class="font-weight-bold">DISABILITY_STATUS</th>
                            <th class="font-weight-bold">LRN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="info in list" class="text-center">
                            <td>
                            <button @click="deleteBeneficiary(info.ENTRY_ID)" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                <i class="fas fa-trash"></i> DELETE
                            </button>
                            <button @click="editBeneficiary(info.ENTRY_ID)" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                <i class="fas fa-edit"></i> EDIT
                            </button>
                            </td>
                            <td>{{info.REGION}}</td>
                            <td>{{info.PROVINCE}}</td>
                            <td>{{info.MUNICIPALITY}}</td>
                            <td>{{info.BRGY}}</td>
                            <td>{{info.FIRST_NAME}}</td>
                            <td>{{info.MIDDLE_NAME}}</td>
                            <td>{{info.LAST_NAME}}</td>
                            <td>{{info.HH_ID}}</td>
                            <td>{{info.ENTRY_ID}}</td>
                            <td>{{info.SEX}}</td>
                            <td>{{info.AGE}}</td>
                            <td>{{info.BIRTHDAY ? new Date(info.BIRTHDAY).toLocaleDateString() : ''}}</td>
                            <td>{{info.CLIENT_STATUS}}</td>
                            <td>{{info.EXT_NAME}}</td>
                            <td>{{info.REGISTRATION_STATUS}}</td>
                            <td>{{info.HH_SET}}</td>
                            <td>{{info.SOLO_PARENT}}</td>
                            <td>{{info.IP_AFFILIATION}}</td>
                            <td>{{info.PREGNANCY_STATUS}}</td>
                            <td>{{info.HEALTH_FACILITY}}</td>
                            <td>{{info.CHILD_BENE}}</td>
                            <td>{{info.GRADE_LEVEL}}</td>
                            <td>{{info.ATTEND_SCHOOL}}</td>
                            <td>{{info.SCHOOL_NAME}}</td>
                            <td>{{info.MONITORED_EDUC}}</td>
                            <td>{{info.REASON_FOR_NOT_ATTENDING_EDUC}}</td>
                            <td>{{info.DATE_REASON_EDUC ? new Date(info.DATE_REASON_EDUC).toLocaleDateString() : ''}}</td>
                            <td>{{info.MONITORED_HEALTH}}</td>
                            <td>{{info.REASON_FOR_NOT_ATTENDING_HEALTH}}</td>
                            <td>{{info.DATE_REASON_HEALTH ? new Date(info.DATE_REASON_HEALTH).toLocaleDateString() : ''}}</td>
                            <td>{{info.DISABILITY_ID}}</td>
                            <td>{{info.DISABILITY_STATUS}}</td>
                            <td>{{info.LRN}}</td>
                        </tr>            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </template>
    <script>
    import axios from 'axios'
    import { onMounted } from 'vue'
    import flatpickr from 'flatpickr';

    export default{
        name:'list',
    
    data(){
                return{
                    list:[],
                    editedInfo: {}, 
                    newBeneficiary: {
                    REGION: '',
                    PROVINCE:'',
                    MUNICIPALITY:'',
                    BRGY:'',
                     FNAME:'',
                     MNAME:'',
                     LNAME:'',
                     BDAY:'',
                     AGE:'',
                     SEX:'',
                     CLIENT:'',
                     MEMBER:'',
                     GRANTEE:'',
                     RELATION:'',
                     REGISTRATION:'',
                     SCHOOL:'',
                     GRADE:'',
                },
                }
            },

        created() {
            this.getAll();
        },
        mounted() {
          flatpickr("#dateValidated", { dateFormat: "Y-m-d" });
          flatpickr("#dateSubmitted", { dateFormat: "Y-m-d" });
        },
      
        methods:{
            async getAll(){
                try {
                const ins =  await axios.get('getList');
                        this.list = ins.data;
                } catch (error) {
                    console.log(error);
                }
            },
            async deleteBeneficiary(entryId) {
            try {
                const response = await axios.post(`deleteBeneficiary/${entryId}`);
                if (response.status === 200) {
                    console.log(response.data.message);
                    this.getAll();
            } 
            } catch (error) {
                console.error(error.response.data.error);
            }
        },async editBeneficiary(entryId) {
        // Find the entry in the list based on entryId
        const selectedEntry = this.list.find((entry) => entry.ENTRY_ID === entryId);

        // Set the editedInfo data
        this.editedInfo = { ...selectedEntry };

        // Show the modal
        // Use nextTick to wait for the component to be mounted
        this.$nextTick(() => {
        const modal = new bootstrap.Modal(this.$refs.editModal);
        modal.show();
    });
    },

    async saveChanges() {
    try {
        // Send the updated data and ID to the backend
        const response = await axios.post(`updateBeneficiary/${this.editedInfo.ENTRY_ID}`, {
        region: this.editedInfo.REGION,
        province: this.editedInfo.PROVINCE,
        municipality: this.editedInfo.MUNICIPALITY,
        fName: this.editedInfo.FIRST_NAME,
        mName: this.editedInfo.MIDDLE_NAME,
        lName: this.editedInfo.LAST_NAME,
        bday: this.editedInfo.BIRTHDAY,
        age: this.editedInfo.AGE,
        sex: this.editedInfo.SEX,
        });

        if (response.data) {
        console.log(response.data.message);
        window.location.reload();
        }
    } catch (error) {
        console.error(error.response.data.error);
    }
    },
    async addBeneficiary() {
      try {
        // Send the newBeneficiary data to the backend
        const response = await axios.post('addBeneficiary', this.newBeneficiary);

        if (response.data) {
            this.newBeneficiary.ENTRY_ID = generateEntryID();
          console.log(response.data.message);
           window.location.reload();
        }
      } catch (error) {
        console.error(error.response.data.error);
      }
    },

    openAddModal() {
      // Clear the newBeneficiary object when opening the modal
      this.newBeneficiary = {
        REGION: '',
        PROVINCE:'',
        MUNICIPALITY:'',
        BRGY:'',
        FNAME:'',
        MNAME:'',
        LNAME:'',
        BDAY:'',
        AGE:'',
        SEX:'',
        CLIENT:'',
        MEMBER:'',
        GRANTEE:'',
        RELATION:'',
        REGISTRATION:'',
        SCHOOL:'',
        GRADE:'',
      };
      
  


      // Use nextTick to wait for the component to be mounted
      this.$nextTick(() => {
        const modal = new bootstrap.Modal(this.$refs.addModal);
        modal.show();
      });
    },
  


        closeModal() {
        // Manually close the modal using JavaScript
        const modal = new bootstrap.Modal(this.$refs.editModal);
        modal.hide();
        },
        },
        setup() {
            async function loadScript(src) {
            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = src;
                script.onload = resolve;
                script.onerror = reject;
                document.head.appendChild(script);
            });
            }
        
            async function loadScriptsInOrder(scriptUrls) {
            for (const url of scriptUrls) {
                await loadScript(url);
            }
            }
        
            onMounted(async () => {
            await loadScriptsInOrder([
        
            '../vendor/jquery/jquery.min.js', 
        '../vendor/chart.js/Chart.min.js',   
        '../vendor/jquery-easing/jquery.easing.min.js',   
        '../vendor/bootstrap/js/bootstrap.bundle.min.js', 
        '../vendor/datatables/jquery.dataTables.min.js',    
        '../js/sb-admin-2.min.js',  
        '../vendor/datatables/dataTables.bootstrap4.min.js',  
        '../js/demo/datatables-demo.js',  
            ]);
            });
    }
    }
    </script>

    <style>

    </style>