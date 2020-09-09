<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Product</h3>
            <router-link to="/product" class="btn btn-success float-right">All Product</router-link>
        </div>
        <form @submit.prevent="productInsert" enctype="multipart/form-data" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input v-model="form.product_name" type="text" class="form-control" id="product_name" placeholder="Product Name">
                            <small v-if="errors.product_name" class="text-danger">{{errors.product_name[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input v-model="form.product_code" type="text" class="form-control" id="product_code" placeholder="Product Code">
                            <small v-if="errors.product_code" class="text-danger">{{errors.product_code[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Select a Category</label>
                            <select class="form-control" v-model="form.category_id">
                                <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
                            </select>
                            <small v-if="errors.category_id" class="text-danger">{{errors.category_id[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Select a Supplier</label>
                            <select class="form-control" v-model="form.supplier_id">
                                <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id">{{supplier.name}}</option>

                            </select>
                            <small v-if="errors.supplier_id" class="text-danger">{{errors.supplier_id[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input v-model="form.quantity" type="number" class="form-control" id="quantity" placeholder="Quantity">
                            <small v-if="errors.quantity" class="text-danger">{{errors.quantity[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input :value="1" class="form-check-input mt-4" type="checkbox"  v-model="form.status">
                                <label class="form-check-label mt-4">Status</label>
                                <small v-if="errors.status" class="text-danger">{{errors.status[0]}}</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="exampleInputFile">Product Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" @change="onFileSelected">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <small v-if="errors.product_image" class="text-danger">{{errors.product_image[0]}}</small>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <label style="display: none">Selected File</label><br>
                        <img :src="form.product_image" style="height: 50px; width: 50px;">
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
                    product_name: '',
                    product_code: '',
                    category_id: '',
                    supplier_id: '',
                    status: '',
                    product_image: '',
                    quantity:''
                },
                errors:{},
                categories:[],
                suppliers:[]
            }
        },
        methods:{
            productInsert(){
                axios.post('/api/product/',this.form)
                    .then(() => {
                        this.$router.push({name: 'product'});
                        Notification.success();
                    })
                    .catch((error) =>{
                        this.errors = error.response.data.errors
                    })
            },
            onFileSelected(event){
                let file = event.target.files[0];
                if(file.size > 1048770){
                    Notification.imageValidation();
                }
                else {
                    let reader = new FileReader();
                    reader.onload = (event) =>{
                        this.form.product_image = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }

        },
        mounted() {
            axios.get('/api/category/')
                .then((res) => {
                    this.categories = res.data.categories;
                })
                .catch();
            axios.get('/api/supplier/')
                .then((res) => {
                    this.suppliers = res.data.suppliers
                })
                .catch();
        }
    }
</script>
<style>

</style>