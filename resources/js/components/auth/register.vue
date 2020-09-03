<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Create New Account</p>

                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input name="name" type="text" class="form-control" placeholder="Name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-people-arrows"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Retype Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

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
<script>

</script>
<style>

</style>