<template>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h6 class="float-left">Customer Details</h6>
                    <router-link to="/customer" class="btn btn-success float-right">Back</router-link>
                </div>
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" :src="`/`+form.photo" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{form.name}}</h3>


                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Address</b> <a class="float-right">{{form.address}}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
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
                form:[]
            }
        },
        mounted(){
            let id = this.$route.params.id;
            axios.get('/api/customer/'+id)
                .then((res) => {
                    this.form = res.data.row;
                })
                .catch()
        }
    }
</script>
<style>

</style>