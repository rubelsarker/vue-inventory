<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form @submit.prevent="login">
                        <div class="input-group">
                            <input  v-model="form.email"  type="email" class="form-control" placeholder="Email">
                        </div>
                        <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
                        <div class="input-group mt-3">
                            <input  v-model="form.password"  type="password" class="form-control" placeholder="Password">
                        </div>
                        <small v-if="errors.password" class="text-danger">{{errors.password[0]}}</small>
                        <div class="row mt-3">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>



                    <p class="mb-1">
                        <router-link to="/forget" >I forgot my password</router-link>
                    </p>
                    <p class="mb-0">
                        <router-link to="/register" class="text-center">Register a new membership</router-link>
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
                    email: null,
                    password: null
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
            login(){
                axios.post('/api/auth/login',this.form)
                    .then(res => {
                        User.responseAfterLogin(res);
                        Toast.fire({
                            icon: 'success',
                            title: 'Signed in successfully'
                        });
                        this.$router.push({name : 'home'});
                    })
                    .catch(error => this.errors = error.response.data.errors)
                    .catch(
                        Toast.fire({
                            icon: 'error',
                            title: 'Invalid Email Or Password '
                        })
                    )
            }
        }
    }
</script>
<style>

</style>