<template>
<div>
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Table</h3>

                    <div class="card-tools">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addNewModal">Add new <i class="fas fa-user-plus fa-fw"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <!-- <th>Bio</th>
                                <th>Photo</th> -->
                                <th>Registered At</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="customer in customers" :key="customer.id">
                                <td>{{customer.id}}</td>
                                <td>{{customer.name}}</td>
                                <td>{{customer.email}}</td>
                                <!-- <td>{{customer.password}}</td> -->
                                <td>{{customer.type | upText}}</td>
                                <td>{{customer.created_at | myDate}}</td>
                                <td>{{customer.updated_at | myDate}}</td>
                                <!-- <td>{{customer.bio}}</td> -->
                                <!-- <td>{{customer.photo}}</td> -->
                                <!-- <td><span class="tag tag-success">Approved</span></td> -->
                                <td>
                                    <a href="#">
                                        <i class="fa fa-edit blue"></i>
                                    </a> |
                                    <a href="#">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewLabel">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="createCustomer">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="">Name:</label>
                      <input type="text" v-model="name" class="form-control" placeholder="Enter your name" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Email:</label>
                      <input type="text" v-model="email" class="form-control" placeholder="Enter your email" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Password:</label>
                      <input type="text" v-model="password" class="form-control" placeholder="Enter your password" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select id="type" v-model="type" class="form-control" name="">
                        <option value="">Select your role</option>
                        <option value="admin">Admin</option>
                        <option value="user">Standard person</option>
                        <option value="author">Author</option>
                        </select>   
                    </div>
                    <div class="form-group">
                      <label for="">Bio:</label>
                      <textarea v-model="bio" id="bio" class="form-control" placeholder="Enter your bio" aria-describedby="helpId"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Photo:</label>
                      <input type="text" v-model="photo" id="photo" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
    data() {
        return {
                customers:{},
                name:'',
                email:'',
                password:'',
                type:'',
                bio:'',
                photo:''
        }
    },

    methods: {
        loadCustomers(){
            axios.get('api/index').then((res) => {
                 this.customers = res.data
            });
        },
        createCustomer(){
            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('email', this.email);
            formData.append('password', this.password);
            formData.append('type', this.type);
            formData.append('bio', this.bio);
            formData.append('photo', this.photo);
            this.$Progress.start()
            axios.post('/api/create', formData)
                .then((response)=>{
                Fire.$emit('AfterCreate');
                $('#addNewModal').modal('hide');
                this.$toast.fire({
                icon: 'success',
                title: 'Customer created successfully'
                })
                this.$Progress.finish();
                this.data = response.data
                console.log(response)
                }).catch((err)=>{
                    if(err.response.status === 422){
                    this.error = response.data.message.errors
                    console.log(this.error)}else{
                        this.$message({
                        message: `An error occured, pls try again later`,
                        type: "error",
                        })
                })
            },
        },

    created(){
        this.loadCustomers();
        Fire.$on('AfterCreate', () => {
            this.loadCustomers()
        });
        // setInterval(() => this.loadCustomers(), 3000)
    }
}
</script>
