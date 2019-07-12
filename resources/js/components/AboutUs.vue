<template>
    <div>
        <!-- ##### Breadcumb Area Start ##### -->
        <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcumb-content">
                            <h3 class="breadcumb-title">About us</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Breadcumb Area End ##### -->

        <!-- ##### Meet The Team Area Start ##### -->
        <section class="meet-the-team-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading">
                            <h2>Meet The Team</h2>
                            <p>Suspendisse dictum enim sit amet libero</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <!-- Single Team Member -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="250ms">
                            <!-- Team Member Thumb -->
                            <div class="team-member-thumb">
                                <img :src="'/image/profile/' + owner.photo" alt="">
                            </div>
                            <!-- Team Member Info -->
                            <div class="team-member-info">
                                <div class="section-heading">
                                    <img src="img/icons/prize.png" alt="">
                                    <h2>{{ owner.name }}</h2>
                                    <p>CEO</p>
                                </div>
                                <div class="address">
                                    <h6><img src="img/icons/phone-call.png" alt=""> {{ owner.phone }}</h6>
                                    <h6><img src="img/icons/envelope.png" alt=""> {{ owner.email }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Meet The Team Area End ##### -->
    </div>
</template>

<script>
    export default {
        data () {
            return {
                owner : {},
            }
        },
        methods : {
            getOwner(){
                axios.get('/api/owner', this.$parent.config).then((res) => {
                    this.owner = res.data
                    console.log(this.owner)
                })
            },
        },
        mounted() {
            this.getOwner()
            console.log('Component mounted.')
        }
    }
</script>
