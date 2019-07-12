<template>
    <div>
        <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcumb-content">
                            <h3 class="breadcumb-title">Properties</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Breadcumb Area End ##### -->

        <!-- ##### Advance Search Area Start ##### -->
        <div class="south-search-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="advanced-search-form">
                            <!-- Search Title -->
                            <div class="search-title">
                                <p>Search for your home</p>
                            </div>
                            <!-- Search Form -->
                            <form action="#" method="post" id="advanceSearch">
                                <div class="row">

                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <select class="form-control" id="cities">
                                                <option>All Cities</option>
                                                <option>Riga</option>
                                                <option>Melbourne</option>
                                                <option>Vienna</option>
                                                <option>Vancouver</option>
                                                <option>Toronto</option>
                                                <option>Calgary</option>
                                                <option>Adelaide</option>
                                                <option>Perth</option>
                                                <option>Auckland</option>
                                                <option>Helsinki</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <select class="form-control" id="catagories">
                                                <option>All Catagories</option>
                                                <option>Apartment</option>
                                                <option>Bar</option>
                                                <option>Farm</option>
                                                <option>House</option>
                                                <option>Store</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 col-xl-2">
                                        <div class="form-group">
                                            <select class="form-control" id="bedrooms">
                                                <option>Bedrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 col-xl-2">
                                        <div class="form-group">
                                            <select class="form-control" id="bathrooms">
                                                <option>Bathrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 col-xl-2">
                                        <div class="form-group">
                                                <div data-min="75" data-max="2000" data-unit="m" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="75" data-value-max="2000">
                                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                                </div>
                                            <div class="range">75m - 2000m</div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between align-items-end">
                                        <div class="form-group mb-0">
                                            <input type="input" class="form-control" name="input" placeholder="Keyword">
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn south-btn">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Advance Search Area End ##### -->

        <!-- ##### Listing Content Wrapper Area Start ##### -->
        <section class="listings-content-wrapper section-padding-100">
            <div class="container">
                <div class="row">
                    <!-- Single Featured Property -->
                    <div class="col-12 col-md-6 col-xl-4" v-for="(property, index) in properties.data" :key="index">
                        <div class="single-featured-property mb-50">
                            <!-- Property Thumbnail -->
                            <div class="property-thumb">
                                <img :src="'/image/properties/' + property.image" alt="">

                                <div class="tag">
                                    <span>For Sale</span>
                                </div>
                                <div class="list-price">
                                    <p>Rp. {{ property.price }}</p>
                                </div>
                            </div>
                            <!-- Property Content -->
                            <div class="property-content">
                                <h5>{{ property.name }}</h5>
                                <p class="location"><img src="img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                                <p>{{ property.description.substring(0,200)+".." }}</p>
                                <div class="property-meta-data d-flex align-items-end justify-content-between">
                                    <div class="new-tag">
                                        <img src="img/icons/new.png" alt="">
                                    </div>
                                    <div class="bathroom">
                                        <img src="img/icons/bathtub.png" alt="">
                                        <span>{{ property.bathrooms }}</span>
                                    </div>
                                    <div class="garage">
                                        <img src="img/icons/garage.png" alt="">
                                        <span>1</span>
                                    </div>
                                    <div class="space">
                                        <img src="img/icons/space.png" alt="">
                                        <span>{{ property.surface_area }} M</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="south-pagination d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link active" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Listing Content Wrapper Area End ##### -->
    </div>
</template>

<script>
    window.scrollTo(0,0)
    export default {
        data() {
            return{
                properties : {},
                range : ''
            }
        },
        methods : {
            getProperties(){
                axios.get('/api/property', this.$parent.config).then((res) => {
                    this.properties = res.data
                })
            }
        },
        mounted() {
            console.log(this.range)
            this.getProperties()
            console.log('Component mounted.')
        }
    }
</script>
