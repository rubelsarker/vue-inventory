<template>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h6 class="float-left">Product Details</h6>
                    <router-link to="/product" class="btn btn-success float-right">Back</router-link>
                </div>
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" :src="`/`+product.product_image" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{product.product_name}}</h3>


                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Quantity</b> <a class="float-right">{{product.quantity}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Category</b> <a class="float-right">{{catName}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Supplier</b> <a class="float-right">{{supplierName}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Date</b> <a class="float-right">{{Date(product.created_at)}}</a>
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
                product:[],
                catName:'',
                supplierName:''
            }
        },
        mounted(){
            let id = this.$route.params.id;
            axios.get('/api/product/'+id)
                .then((res) => {
                    this.product = res.data.row;
                    this.catName = res.data.row.category.name;
                    this.supplierName = res.data.row.supplier.name;
                })
                .catch()
        }
    }
</script>
<style>

</style>