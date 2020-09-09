<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Product</h3>
            <router-link to="/store-product" class="btn btn-success float-right">Add New Product</router-link>
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
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="row in  filterSearch" :key="row.id">
                    <td>{{row.product_name}}</td>
                    <td><img :src="row.product_image" height="45" width="45"></td>
                    <td>{{row.category.name}}</td>
                    <td >
                        <span v-if="row.status == 1" class="text-success">Active</span>
                        <span v-if="row.status == 0" class="text-danger">Inactive</span>
                    </td>
                    <td class="text-center" >
                        <router-link :to="{name:'show-product', params:{id: row.id}}" class="btn btn-primary btn-sm">View</router-link>
                        <router-link :to="{name:'edit-product', params:{id: row.id}}" class="btn btn-info btn-sm">Edit</router-link>
                        <a @click="deleteProduct(row.id)" class="btn btn-danger btn-sm">Delete</a>
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
                products:[],
                searchTerm:''
            }
        },
        computed:{
            filterSearch(){
               return this.products.filter( (product) =>{
                  return  product.product_name.match(this.searchTerm);
                })
            }
        },
        methods:{
            allproduct(){
                axios.get('/api/product/')
                    .then((res) => {
                        this.products = res.data.products;
                       // console.log(res.data.products[0].category.name);
                    })
                    .catch()
            },
            deleteProduct(id){
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
                        axios.delete('/api/product/'+id)
                            .then(() =>{
                                this.products = this.products.filter(product =>{
                                    return product.id != id;
                                })
                            })
                            .catch(() => {
                                this.$route.push({name:'product'})
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
            this.allproduct();
        }

    }
</script>
<style>

</style>