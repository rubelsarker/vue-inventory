<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Employee</h3>
            <router-link to="/employee" class="btn btn-success float-right">All Employee</router-link>
        </div>
        <form @submit.prevent="employeeUpdate" enctype="multipart/form-data" >
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
                            <label for="email">Name</label>
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
                            <label for="salary">Salary</label>
                            <input v-model="form.salary" type="text" class="form-control" id="salary" placeholder="Salary">
                            <small v-if="errors.salary" class="text-danger">{{errors.salary[0]}}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="joining_date">Joining Date</label>
                            <input v-model="form.joining_date" type="date" class="form-control" id="joining_date" placeholder="Joining Date">
                            <small v-if="errors.joining_date" class="text-danger">{{errors.joining_date[0]}}</small>
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
                                    <input  type="file" class="custom-file-input" id="exampleInputFile" @change="onFileSelected">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <small v-if="errors.new_photo" class="text-danger">{{errors.new_photo[0]}}</small>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <label style="display: none">Old photo</label><br>
                        <img :src="newphoto" style="height: 50px; width: 50px;">
                        <label style="display: none">Old photo</label>
                        <img :src="`/`+form.photo" style="height: 50px; width: 50px;">
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
                    new_photo: '',
                    nid_number: '',
                    joining_date: '',
                    salary: '',
                    address: ''
                },
                errors:{},
                newphoto:''
            }
        },
        mounted(){
            let id = this.$route.params.id;
            axios.get('/api/employee/'+id)
                .then((res)=>{
                    this.form = res.data.row
                })
                .catch((e)=>{
                  console.log(e);
                })
        },
        methods:{
            employeeUpdate(){
                let id = this.$route.params.id;
                axios.patch('/api/employee/'+id,this.form)
                    .then(() => {
                        this.$router.push({name: 'employee'});
                        Notification.success();
                    })
                    .catch(error => this.errors = error.response.data.errors)
            },
            onFileSelected(event){
                let file = event.target.files[0];
                if(file.size > 1048770){
                    Notification.imageValidation();
                }
                else {
                    let reader = new FileReader();
                    reader.onload = (event) =>{
                        this.newphoto = event.target.result;
                        this.form.new_photo = this.newphoto;
                    };
                    reader.readAsDataURL(file);
                }
            }

        }
    }
</script>
<style>

</style>