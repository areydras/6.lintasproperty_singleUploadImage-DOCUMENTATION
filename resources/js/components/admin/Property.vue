<template>
    <div class="container pt-5">
        <div class="card" v-if="$gate.isAdmin()">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="padding-top: 10px">
                        <h4 class="card-title">Property List</h4>
                    </div>
                    <div class="col-md-6 text-right" style="padding-bottom: 10px">
                        <button type="button" class="btn btn-primary col-md-3" data-toggle="modal" @click="modalShow()">
                            Create
                        </button>
                    </div>                    
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" width="250">Name</th>
                                <th scope="col">City</th>
                                <th scope="col">Category</th>
                                <th scope="col">Surface Area</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(property, index) in properties.data" :key="index">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ property.name }}</td>
                                <td>{{ property.city }}</td>
                                <td>{{ property.category }}</td>
                                <td>{{ property.surface_area }} M</td>
                                <td>Rp. {{ property.price }},00</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#propertyDetails" @click.prevent="propertyDetails(property.id)">Details</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#property" @click.prevent="editProperty(property.id)">Edit</button>
                                    <button type="button" class="btn btn-danger" @click.prevent="deleteProperty(property.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div v-else>
            <page-404></page-404>
        </div>
        <!-- Modal Create or Edit -->
        <div class="modal fade" id="property" tabindex="-1" role="dialog" aria-labelledby="propertyTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="propertyTitle" v-show="!editMode">Create Property</h5>
                        <h5 class="modal-title" id="propertyTitle" v-show="editMode">Edit Property</h5>
                        <button type="button" class="close" aria-label="Close" @click="modalHide('#property')">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateProperty() : createProperty()">
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input v-model="form.name" type="text" name="name"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                            <has-error :form="form" field="name"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bedrooms</label>
                                            <input v-model="form.bedrooms" type="number" name="bedrooms"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('bedrooms') }">
                                            <has-error :form="form" field="bedrooms"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bathrooms</label>
                                            <input v-model="form.bathrooms" type="number" name="bathrooms"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('bathrooms') }">
                                            <has-error :form="form" field="bathrooms"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input v-model="form.city" type="text" name="city"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('city') }">
                                            <has-error :form="form" field="city"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="custom-select" :class="{ 'is-invalid': form.errors.has('category') }" v-model="form.category" name="category">
                                                <option value="apartment">Apartment</option>
                                                <option value="house">House</option>
                                                <option value="store">Store</option>
                                                <option value="land">Land</option>
                                            </select>
                                            <has-error :form="form" field="category"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Surface Area</label>
                                            <input v-model="form.surface_area" type="number" name="surface_area"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('surface_area') }">
                                            <has-error :form="form" field="surface_area"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('price') }" aria-label="Amount (to the nearest dollar)" name="price" v-model="form.price">
                                                <has-error :form="form" field="price"></has-error>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Custom File upload</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01" @change="previewImage">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" v-if="imagePreview">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <label for="">Preview Image</label>
                                        <img :src="defaultImage ? '/img/image/default.png' : imagePreview" alt="" class="img-thumbnail" width="300" height="150">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea v-model="form.address" type="text" name="address" rows="2"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                                    </textarea>
                                    <has-error :form="form" field="address"></has-error>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea v-model="form.description" type="text" name="description" rows="7"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                                    </textarea>
                                    <has-error :form="form" field="description"></has-error>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="modalHide('#property')">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>     

        <!-- Modal Details -->
        <div class="modal fade" id="propertyDetails" tabindex="-1" role="dialog" aria-labelledby="propertyDetailsTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="propertyDetailsTitle">{{ property_details.name }}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" v-if="property_details.image">
                            <img :src="'/image/properties/'+property_details.image" alt="" class="img-thumbnail"> 
                        </div>
                        <h6>{{ property_details.address }}</h6><br><br>
                        <h4>Description</h4>
                        <h6>{{ property_details.description }}</h6><br><br>
                        <div class="row">
                            <div class="col-md-3">
                                <p>Bedrooms : {{ property_details.bedrooms }}</p>
                            </div>
                            <div class="col-md-3">
                                <p>Bathrooms : {{ property_details.bathrooms }}</p>
                            </div>
                            <div class="col-md-3">
                                <p>Surface Area : {{ property_details.surface_area }} M</p>
                            </div>
                        </div>
                        <h5 class="font-weight-bolder">Rp. {{ property_details.price }} </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                defaultImage : true,
                imagePreview : '',
                editMode : true,
                properties : {},
                property_details : {},
                form : new Form({
                    id : '',
                    name : '',
                    bedrooms : '',
                    bathrooms : '',
                    city : '',
                    category : '',
                    description : '',
                    address : '',
                    image : '',
                    surface_area : '',
                    price : ''
                }),
            }
        },
        methods : {
            modalShow(){
                this.editMode = false
                $('#property').modal('show')
            },
            modalHide(id){
                $(id).modal('hide')
                //pakai ini jika modal-backdrop tidak terhide
                $(document.body).removeClass("modal-open"); 
                $(".modal-backdrop").remove();
                this.property_details = {}
                this.imagePreview = ''
                this.form.reset()
            },
            getProperty(){
                this.form.get('/api/property', this.$parent.config).then((res) => {
                    this.properties = res.data
                })
            },
            previewImage: function(event){
                let input = event.target

                if(input.files && input.files[0]){
                    let reader = new FileReader()
                    let file = input.files[0]
                    let limitSize = 1024*1024*2
                    let imageExtension = file.name.split('.').pop().toUpperCase()
                    if(imageExtension == 'PNG' || imageExtension == 'JPG' || imageExtension == 'JPEG'){
                        if(file.size > limitSize){
                            Swal.fire({
                                type : 'error',
                                title : 'Oops',
                                text : 'Image max is 2 MB'
                            })
                        }else{
                            reader.onload = (e) => {
                                this.defaultImage = false
                                this.imagePreview = reader.result
                                this.form.image = reader.result
                            }
                        }
                    }else{
                        Swal.fire({
                            type : 'error',
                            title : 'Oops',
                            text : 'Upload only images'
                        })
                    }
                    reader.readAsDataURL(file)
                }
            },
            propertyDetails(id){
                this.form.get('/api/property/details/' + id, this.$parent.config).then((res) => {
                    this.property_details = res.data
                })
            },
            createProperty(){
                this.form.post('/api/property', this.$parent.config).then((res) => {
                    Swal.fire(
                        'Create Success',
                        'You created ' + res.data.name,
                        'success'
                        )
                    this.modalHide('#property')
                    this.getProperty()
                })
            },
            editProperty(id){
                this.defaultImage = false
                this.editMode = true
                this.form.get('/api/property/details/' + id, this.$parent.config).then((res) => {
                    this.form.fill(res.data)
                    if(res.data.image){
                        this.imagePreview = '/image/properties/'+res.data.image
                    }
                    $('#property').modal('show')
                })
            },
            updateProperty(){
                this.form.put('/api/property/' + this.form.id, this.$parent.config).then((res) => {
                    Swal.fire(
                        'Updated Success',
                        'You updated ' + res.data.name,
                        'success'
                        )
                    this.modalHide('#property')
                    this.getProperty()
                })
            },
            deleteProperty(id){
                this.form.delete('/api/property/' + id, this.$parent.config).then((res) => {
                    Swal.fire(
                        'Delete Success',
                        'You deleted ' + res.data.name,
                        'success'
                        )
                    this.modalHide('#property')
                    this.getProperty()
                })
            }
        },
        mounted() {
            this.getProperty()
            console.log('Component mounted.')
        }
    }
</script>
