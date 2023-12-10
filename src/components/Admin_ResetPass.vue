<template>
    <body class=" bg-primary">
    <div class="container mt-5">
      <div class="row align-items-center justify-content-center min-vh-100 ">
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-body mt-5">
              <h2 class="text-center mb-4">Forgot Password</h2>
              <div v-if="errorMessage" class="alert alert-danger mt-3">
                {{ errorMessage }}
              </div>
              <form @submit.prevent="submitForm">
                <div class="mb-3">
                  <label for="email" class="form-label">Email Address</label>
                  <input
                    type="email"
                    class="form-control"
                    v-model="email"
                    placeholder="Enter your email"
                    required
                  />
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
  </template>
  
  <script>
  import axios from 'axios'
  export default {
    data() {
      return {
        email: '',
        errorMessage: '',
      };
    },
    methods: {
        async submitForm() {
      try {
        const response = await axios.post(`/forgotPass/${this.email}`, { email: this.email });
     
        localStorage.setItem('id', response.data.id);
    console.log(response.data.id);
    this.$router.push('/updatePass');
        // Handle the response from the server here
      } catch (error) {
        if (error.response && error.response.data.messages) {
          this.errorMessage = error.response.data.messages.error;

          setTimeout(() => {
            this.errorMessage = '';
          }, 2000);
        } else {
          this.errorMessage = 'An error occurred while processing your request.';
        }
      }
    },
    },
  };
  </script>
  
  <style scoped>
  /* Add custom styles or override Bootstrap styles here */
  </style>
  