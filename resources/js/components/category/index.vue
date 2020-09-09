<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Category</h3>
            <router-link to="/store-category" class="btn btn-success float-right">Add New Category</router-link>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="row in categories" :key="row.id">
                    <td>{{row.name}}</td>
                    <td class="text-center" >
                        <router-link :to="{name:'edit-category', params:{id: row.id}}" class="btn btn-info btn-sm">Edit</router-link>
                        <a @click="deleteCategory(row.id)" class="btn btn-danger btn-sm">Delete</a>
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
                categories:[]
            }
        },

        methods:{
            allCategory(){
                axios.get('/api/category/')
                    .then((res) => {
                        this.categories = res.data.categories;
                    })
                    .catch()
            },
            deleteCategory(id){
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
                        axios.delete('/api/category/'+id)
                            .then(() =>{
                                this.categories = this.categories.filter(category =>{
                                    return category.id != id;
                                })
                            })
                            .catch(() => {
                                this.$route.push({name:'category'})
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
            this.allCategory();
        }

    }
</script>
<style>

</style>