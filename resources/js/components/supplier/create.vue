<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Supplier</h3>
            <router-link to="/supplier" class="btn btn-success float-right">All Supplier</router-link>
        </div>
        <form @submit.prevent="supplierInsert" enctype="multipart/form-data" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input v-model="form.name" type="text" class="form-control" id="name" placeholder="Name">
                            <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input v-model="form.email" type="email" class="form-control" id="email" placeholder="Email">
                            <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input v-model="form.address" type="text" class="form-control" id="address" placeholder="Address">
                            <small v-if="errors.address" class="text-danger">{{errors.address[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input v-model="form.phone" type="text" class="form-control" id="phone" placeholder="Phone">
                            <small v-if="errors.phone" class="text-danger">{{errors.phone[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="shop_name">Shop Name</label>
                            <input v-model="form.shop_name" type="text" class="form-control" id="shop_name" placeholder="Shop Name">
                            <small v-if="errors.shop_name" class="text-danger">{{errors.shop_name[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nid_number">Nid Number</label>
                            <input v-model="form.nid_number" type="text" class="form-control" id="nid_number" placeholder="Nid Number">
                            <small v-if="errors.nid_number" class="text-danger">{{errors.nid_number[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="exampleInputFile">Photo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" @change="onFileSelected">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <small v-if="errors.photo" class="text-danger">{{errors.photo[0]}}</small>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <label style="display: none">Selected File</label><br>
                        <img :src="form.photo" style="height: 50px; width: 50px;">
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
                    email: '',
                    photo: '',
                    nid_number: '',
                    shop_name: '',
                    phone: '',
                    address: ''
                },
                errors:{}
            }
        },
        methods:{
            supplierInsert(){
                axios.post('/api/supplier/',this.form)
                    .then(() => {
                        this.$router.push({name: 'supplier'});
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
                        this.form.photo = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }

        }
    }
</script>
<style>

</style>