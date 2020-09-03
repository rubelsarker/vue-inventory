<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Forget Password</p>

                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
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
<script>

</script>
<style>

</style>