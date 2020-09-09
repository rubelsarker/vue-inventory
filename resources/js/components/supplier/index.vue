<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Supplier</h3>
            <router-link to="/store-supplier" class="btn btn-success float-right">Add New Supplier</router-link>
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
                        <th class="text-center">Phone Number</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="row in  filterSearch" :key="row.id">
                    <td>{{row.name}}</td>
                    <td><img :src="row.photo" height="45" width="45"></td>
                    <td>{{row.phone}}</td>
                    <td class="text-center" >
                        <router-link :to="{name:'show-supplier', params:{id: row.id}}" class="btn btn-primary btn-sm">View</router-link>
                        <router-link :to="{name:'edit-supplier', params:{id: row.id}}" class="btn btn-info btn-sm">Edit</router-link>
                        <a @click="deleteSupplier(row.id)" class="btn btn-danger btn-sm">Delete</a>
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
                suppliers:[],
                searchTerm:''
            }
        },
        computed:{
            filterSearch(){
               return this.suppliers.filter( (supplier) =>{
                  return  supplier.phone.match(this.searchTerm);
                })
            }
        },
        methods:{
            allSupplier(){
                axios.get('/api/supplier/')
                    .then((res) => {
                        this.suppliers = res.data.suppliers
                    })
                    .catch()
            },
            deleteSupplier(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/supplier/'+id)
                            .then(() =>{
                                this.suppliers = this.suppliers.filter(supplier =>{
                                    return supplier.id != id;
                                })
                            })
                            .catch(() => {
                                this.$route.push({name:'supplier'})
                            })
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        },
        created() {
            this.allSupplier();
        }

    }
</script>
<style>

</style>