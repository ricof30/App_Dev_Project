<template>
    <div>
        <table border="1">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Age</th>
            </tr>
            <tr v-for="info in info">
                <td>{{ info.firstname}}</td>
                <td>{{ info.lastname}}</td>
                <td>{{ info.gender}}</td>
                <td>{{ info.age}}</td>
            </tr>
        </table>
    </div>
</template>
<script>
    import axios from 'axios'
    export default{
        data(){
            return{
                info:[],
            }
        },

        created(){
            this.getInfo();
        },
        methods: {
            async getInfo(){
                try {
                    const inf = await axios.get('getData');
                this.info = inf.data;
                } catch (error) {
                    console.log(error);
                }
            }
        },
    }
</script>
<style>

</style>