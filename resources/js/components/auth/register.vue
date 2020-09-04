<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Create New Account</p>

                    <form @submit.prevent="signup">
                        <div class="input-group">
                            <input v-model="form.name"  type="text" class="form-control" placeholder="Name">
                        </div>
                        <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                        <div class="input-group mt-3">
                            <input v-model="form.email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
                        <div class="input-group mt-3">
                            <input v-model="form.password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <small v-if="errors.password" class="text-danger">{{errors.password[0]}}</small>
                        <div class="input-group mt-3">
                            <input v-model="form.password_confirmation"  type="password" class="form-control" placeholder="Retype Password">
                        </div>
                        <div class="row mt-3">

                            <!-- /.col -->
                            <div class="col-4 offset-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>



                    <p class="mb-1">
                        <router-link to="/" >Already have an account</router-link>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

    </div>

</template>
<script type="text/javascript">
    export default {
        data(){
            return{
                form:{
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                },
                errors:{}
            }

        },
        created(){
            if(User.loggedIn()){
                this.$router.push({name : 'home'})
            }
        },
        methods:{
            signup(){
                axios.post('/api/auth/signup',this.form)
                    .then(res => {
                        User.responseAfterLogin(res);
                        Toast.fire({
                            icon: 'success',
                            title: 'Signed in successfully'
                        });
                        this.$router.push({name : 'home'});
                    })
                    .catch(error => this.errors = error.response.data.errors)

            }
        }
    }
</script>
<style>

</style>