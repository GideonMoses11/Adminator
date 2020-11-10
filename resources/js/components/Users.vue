<template>
<div>
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Table</h3>

                    <div class="card-tools">
                        <button class="btn btn-success" @click="newModal">Add new <i class="fas fa-user-plus fa-fw"></i></button>
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
                                    <a href="#" @click="editModal(customer)">
                                        <i class="fa fa-edit blue"></i>
                                    </a> |
                                    <a href="#" @click="deleteCustomer(customer.id)">
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
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                    <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Customer's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editmode ? updateCustomer() : createCustomer()">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="">Name:</label>
                      <input type="text" v-model="name" class="form-control" placeholder="Enter your name" aria-describedby="helpId">
                        <span ></span>
                    <small style="color:red;" v-if="error.name">{{error.name[0]}}</small> 
                    </div>
                    <div class="form-group">
                      <label for="">Email:</label>
                      <input type="text" v-model="email" class="form-control" placeholder="Enter your email" aria-describedby="helpId">
                    <span ></span>
                    <small style="color:red;" v-if="error.email">{{error.email[0]}}</small> 
                    </div>
                    <div class="form-group">
                    
                      <label for="">Password:</label>
                      <input type="text" v-model="password" class="form-control" placeholder="Enter your password" aria-describedby="helpId">
                        <span ></span>
                        <small style="color:red;" v-if="error.password">{{error.password[0]}}</small> 
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select id="type" v-model="type" class="form-control" name="">
                        <option value="">Select your role</option>
                        <option value="admin">Admin</option>
                        <option value="user">Standard person</option>
                        <option value="author">Author</option>
                        </select> 
                        <span ></span>
                        <small style="color:red;" v-if="error.type">{{error.type[0]}}</small>  
                    </div>
                    <div class="form-group">
                      <label for="">Bio:</label>
                      <textarea v-model="bio" id="bio" class="form-control" placeholder="Enter your bio" aria-describedby="helpId"></textarea>
                        <span ></span>
                        <small style="color:red;" v-if="error.bio">{{error.bio[0]}}</small> 
                    </div>
                    <div class="form-group">
                      <label for="">Photo:</label>
                      <input type="text" v-model="photo" id="photo" class="form-control" placeholder="" aria-describedby="helpId">
                        <span ></span>
                        <small style="color:red;" v-if="error.photo">{{error.photo[0]}}</small> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" v-show="editmode" class="btn btn-success">Update</button>
                    <button type="submit" v-show="!editmode" class="btn btn-primary">Create</button>
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
            editmode: false,
                
                customers:{},
                id: '',
                name:'',
                email:'',
                password:'',
                type:'',
                bio:'',
                photo:'', 
                error: ''
        }
    },

    methods: {
        updateCustomer(id){
            const formData = new FormData();
            formData.append(this.name, 'name');
            formData.append(this.email, 'email');
            formData.append(this.password, 'password');
            formData.append(this.type, 'type');
            formData.append(this.bio, 'bio');
            formData.append(this.photo, 'photo');
            this.$Progress.start()
            console.log(id);
            axios.put(`/api/update/${id}`, formData)
            .then((response)=>{
                this.response = response.data
                console.log(response.data)
                this.$Progress.finish();
            }).catch((e)=>{
                // this.$progress.fail();
            });
        },
        async editModal(customer){
            axios.get(`api/edit/${id}`)
                this.name = customer.name,
                this.email = customer.email,
                this.password = customer.password,
                this.type = customer.type,
                this.bio = customer.bio,
                this.photo = customer.photo,
                // this.customer = customer.id
 
            this.editmode = true;
            $('#addNew').modal('show');

        },
        newModal(){
            this.editmode = false;
             $('#addNew').modal('show');
        },
        loadCustomers(){
            axios.get('api/index').then((res) => {
                 this.customers = res.data
            });
        },
        deleteCustomer(id){
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                //send request to server
                if(result.isConfirmed){
                axios.delete(`api/destroy/${id}`).then(() => {
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    Fire.$emit('AfterCreate');
                    
                }).catch((error)=>{
                    swal.fire('Failed!', 'There was something wrong.', 'warning')
                });
                }
            })
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
                $('#addNew').modal('hide');
                this.$toast.fire({
                icon: 'success',
                title: 'Customer created successfully'
                })
                this.$Progress.finish();
                this.data = response.data
                console.log(response)
                this.name = '',
                this.email = '',
                this.password = '',
                this.type = '',
                this.bio = '',
                this.photo = ''
                }).catch((err)=>{
                    (err.response.status === 422)
                    this.error = err.response.data.errors
                    console.log(this.error)
                })
            },
        },

    created(){
        this.loadCustomers();
        Fire.$on('AfterCreate', () => {
            this.loadCustomers()
        });
        // setInterval(() => this.loadCustomers(), 3000)
    }, 
    // mounted(){
    //     axios.get(`/api/edit/${this.customer.id}`)
    //     .then((response)=>{
    //         this.customer = response.data
    //     });
    // }
}
</script>
