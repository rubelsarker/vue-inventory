<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Forget Password</p>

                    <form >
                        <div class="input-group mb-3">
                            <input v-model="form.email" type="email" class="form-control" placeholder="Email">
                        </div>

                        <!-- /.col -->
                        <div class="col-8 offset-2">
                            <button type="submit" class="btn btn-primary btn-block">Forget Password</button>
                        </div>
                        <!-- /.col -->

                    </form>
                    <p class="mb-0">
                        <router-link to="/" class="text-center">Back to Login </router-link>
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
                    email: null
                },
                errors:{}
            }
        },
        created(){
            if(User.loggedIn()){
                this.$router.push({name : 'home'})
            }
        },

    }
</script>

<style>

</style>