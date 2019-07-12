<template>
    <div>
        <div v-if="$gate.isAdmin()">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img :src="previewImage ? previewImage : '/image/profile/' + this.form.photo" class="rounded-circle" width="150" height="150" v-show="previewImage || this.form.photo" />
                                    <h4 class="card-title m-t-10">{{ form.name }}</h4>
                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>{{ form.email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{ form.phone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{ form.address }}</h6>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" @submit.prevent="updateUser()">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Name" class="form-control form-control-line" v-model="form.name"> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="Email" class="form-control form-control-line" name="example-email" id="example-email" v-model="form.email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Phone" class="form-control form-control-line" v-model="form.phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <textarea cols="30" rows="10" placeholder="Address" class="form-control form-control-line" v-model="form.address"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label>Photo profile</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" @change="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" value="password" class="form-control form-control-line" v-model="form.password" placeholder="Isi jika ingin mengubah password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>
        </div>
        <div v-else>
            <page-404></page-404>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                previewImage : '',
                form: new Form({
                    id : '',
                    name : '',
                    email : '',
                    phone : '',
                    address : '',
                    photo : '',
                    password : ''
                }),
            }
        },
        methods : {
            image : function(event){
                let input = event.target

                if(input.files && input.files[0]){
                    let reader  = new FileReader()
                    let file = input.files[0]
                    let size = 1024*1024*2
                    let extension = file.name.split('.').pop().toUpperCase()
                    if(extension == 'JPG' || extension == 'PNG' || extension == 'JPEG'){
                        if(file.size > size){
                            Swal.fire({
                                type : 'error',
                                title : 'Oops !',
                                text : 'Size image max 2 MB'
                            })
                        }else{
                            reader.onload = (e) => {
                                this.previewImage = reader.result
                                this.form.photo = reader.result
                            }
                        }
                    }else{
                        Swal.fire({
                            type : 'error',
                            title : 'Oops !',
                            text : 'Upload only images'
                        })
                    }
                    reader.readAsDataURL(file)
                }
            },
            updateUser(){
                this.form.put('/api/user/' + this.form.id, this.$parent.config).then((res) => {
                    this.form.fill(res.data)
                    Toast.fire({
                        type: 'success',
                        title: 'Update successfully'
                    })                    
                })
            }
        },
        mounted() {
            this.form.fill(this.$parent.user)
            console.log('Component mounted.')
        }
    }
</script>
