<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Category</h3>
            <router-link to="/category" class="btn btn-success float-right">All Category</router-link>
        </div>
        <form @submit.prevent="categoryInsert">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input v-model="form.name" type="text" class="form-control" id="name" placeholder="Name">
                            <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </form>
    </div>

</template>
<script type="text/javascript">
    export default {
        created(){
            if(!User.loggedIn()){
                this.$router.push({name : '/'})
            }
        },
        data(){
            return{
                form:{
                    name: '',
                },
                errors:{}
            }
        },
        methods:{
            categoryInsert(){
                axios.post('/api/category/',this.form)
                    .then(() => {
                        this.$router.push({name: 'category'});
                        Notification.success();
                    })
                    .catch((error) =>{
                        this.errors = error.response.data.errors
                    })
            }
        }
    }
</script>
<style>

</style>