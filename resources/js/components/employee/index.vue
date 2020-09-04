<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Employee</h3>
            <router-link to="/store-employee" class="btn btn-success float-right">Add New Employee</router-link>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-4 offset-8 p-4">
                    <input v-model="searchTerm" type="text" class="form-control" placeholder="Search ...">
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Joining Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="row in  filterSearch" :key="row.id">
                    <td>{{row.name}}</td>
                    <td><img :src="row.photo" height="45" width="45"></td>
                    <td>{{row.joining_date}}</td>
                    <td class="text-center" >
                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</template>
<script type="text/javascript">
    export default {
        mounted(){
            if(!User.loggedIn()){
                this.$router.push({name : '/'})
            }
        },
        data(){
            return{
                employees:[],
                searchTerm:''
            }
        },
        computed:{
            filterSearch(){
               return this.employees.filter(employee =>{
                  return  employee.name.match(this.searchTerm);
                })
            }
        },
        methods:{
            allEmployee(){
                axios.get('/api/employee/')
                    .then(({data}) => (this.employees = data))
                    .catch()
            }
        },
        created() {
            this.allEmployee();
        }

    }
</script>
<style>

</style>