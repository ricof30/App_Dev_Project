    <template>
        <body class=" bg-primary">
        <div class="container mt-5">
            <div class="row align-items-center justify-content-center min-vh-100 ">
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h2 class="text-center mb-4">Update Password</h2>
                <form @submit.prevent="submitForm">
                    <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" class="form-control" v-model="newPassword" required />
                    <span v-if="!isValidPassword" class="text-danger">{{ passwordError || 'Please enter a valid password' }}</span>
                    </div>
                    <div class="form-group">
                    <label for="confirmPassword">Confirm New Password</label>
                    <input type="password" class="form-control" v-model="confirmPassword" required />
                    <span v-if="!isValidRepeatPassword" class="text-danger">Passwords do not match</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Update Password</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </body>
    </template>
    
    <script>
    import axios from 'axios';
    
    export default {
        computed: {
        id() {
            return localStorage.getItem('id');
        },
        },
        data() {
        return {
            newPassword: '',
            confirmPassword: '',
            passwordError: '',
            isValidPassword: true,
            isValidRepeatPassword: true,
        };
        },
        methods: {
        async submitForm() {
            this.isValidPassword = this.newPassword.length >= 6; 
            this.isValidRepeatPassword = this.newPassword === this.confirmPassword;
            

            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#])[A-Za-z\d@#]+$/;
            if (!passwordRegex.test(this.newPassword)) {
            this.isValidPassword = false;
            this.passwordError = 'Password must contain at least one letter, one number, and one character';
            }
        
            
            if (this.isValidPassword && this.isValidRepeatPassword) {
            try {
            const inf = await axios.post(`/updatePassword/${this.id}`, {
                newPassword: this.newPassword,
            });
            localStorage.removeItem('id');
            this.$router.push('/login');
            console.log('Update response:', inf.data);
            this.newPassword = '';
            this.confirmPassword = '';
    
            } catch (error) {
            console.error('Error updating password:', error.response.data);
            }
        }
        },
        },
    };
    </script>
    
    <style scoped>
    /* Add custom styles or override Bootstrap styles here */
    </style>
    