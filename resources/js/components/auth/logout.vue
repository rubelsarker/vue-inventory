<template>

</template>
<script type="text/javascript">
    export default {
        created(){
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            Toast.fire({
                icon: 'success',
                title: 'Successfully sign out'
            });
            this.$router.push({name: '/'});
        }
    }
</script>
<style>

</style>