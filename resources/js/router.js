import VueRouter from 'vue-router'

window.Vue = require('vue');
Vue.use(VueRouter)

let routes = [
    // Public Page
    { path: '/', component: require('./components/Index.vue').default },
    { path: '/properties', component: require('./components/Properties.vue').default },
    { path: '/about-us', component: require('./components/AboutUs.vue').default },
    { path: '/contact', component: require('./components/Contact.vue').default },
    
    // Admin Page
    { path: '/admin/profile', component: require('./components/admin/Profile.vue').default },
    { path: '/admin/dashboard', component: require('./components/admin/Dashboard.vue').default },
    // { path: '/admin/client-email', component: require('./components/admin/ClientEmail.vue').default },
    { path: '/admin/client-message', component: require('./components/admin/ClientMessage.vue').default },
    { path: '/admin/office', component: require('./components/admin/Office.vue').default },
    { path: '/admin/property', component: require('./components/admin/Property.vue').default },
    { path: '/admin/client-testimonial', component: require('./components/admin/ClientTestimonial.vue').default },
    { path: '/admin/developer', component: require('./components/admin/Developer.vue').default },
    
    { path: '/admin/*', component: require('./components/admin/404.vue').default },
    { path: '/*', component: require('./components/404.vue').default },
]

window.router = new VueRouter({
    mode: 'history',
    routes
})
