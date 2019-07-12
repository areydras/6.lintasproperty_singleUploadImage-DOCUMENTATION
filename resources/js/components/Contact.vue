<template>
    <div>
        <!-- ##### Breadcumb Area Start ##### -->
        <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcumb-content">
                            <h3 class="breadcumb-title">Contact</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Breadcumb Area End ##### -->

        <section class="south-contact-area section-padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-heading">
                            <h6>Contact info</h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="content-sidebar">
                            <!-- Office Hours -->
                            <div class="weekly-office-hours">
                                <ul>
                                    <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span> <span>09 AM - 19 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09 AM - 14 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span>Sunday</span> <span>Closed</span></li>
                                </ul>
                            </div>
                            <!-- Address -->
                            <div class="address mt-30">
                                <h6><img src="img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
                                <h6><img src="img/icons/envelope.png" alt=""> office@template.com</h6>
                                <h6><img src="img/icons/location.png" alt=""> Main Str. no 45-46, b3, 56832,<br>Los Angeles, CA</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form Area -->
                    <div class="col-12 col-lg-8">
                        <div class="contact-form">
                            <form @submit.prevent="createMessage()">
                                <div class="form-group">
                                    <input type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" name="text" id="contact-name" placeholder="Your Name" v-model="form.name">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" name="number" id="contact-number" placeholder="Your Phone" v-model="form.phone">
                                    <has-error :form="form" field="phone"></has-error>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" name="email" id="contact-email" placeholder="Your Email" v-model="form.email">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" :class="{ 'is-invalid': form.errors.has('message') }" name="message" id="message" cols="30" rows="10" placeholder="Your Message" v-model="form.message"></textarea>
                                    <has-error :form="form" field="message"></has-error>
                                </div>
                                <button type="submit" class="btn south-btn">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Google Maps -->
        <div class="map-area mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="googleMap" class="googleMap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126881.4276021868!2d106.85735097690517!3d-6.388244816306941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69935876c13dbb%3A0x401576d14fed500!2sGunung+Putri%2C+Kec.+Gn.+Putri%2C+Bogor%2C+Jawa+Barat!5e0!3m2!1sid!2sid!4v1561011888588!5m2!1sid!2sid" class="col-12" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                form : new Form({
                    'name' : '',
                    'phone' : '',
                    'email' : '',
                    'message' : ''
                }) 
            }
        },
        methods: {
            createMessage(){
                this.form.post('/api/contact', this.$parent.config).then((res) => {
                    Swal.fire(
                        'Success send message',
                        'Thank you for contact us ' + res.data.name,
                        'success'
                    )
                    this.form.reset()
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
