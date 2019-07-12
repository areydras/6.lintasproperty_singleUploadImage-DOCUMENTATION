require('./bootstrap');
require('./router');

import { Form, HasError, AlertError } from 'vform'
import Swal from 'sweetalert2'
import Gate from './gate'

Vue.prototype.$gate = new Gate(window.user)

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.Form = Form
window.Swal = Swal
window.Toast = Toast

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('page-404', require('./components/admin/404.vue').default);
Vue.component('passport-clients',require('./components/passport/Clients.vue').default);
Vue.component('passport-authorized-clients',require('./components/passport/AuthorizedClients.vue').default);
Vue.component('passport-personal-access-tokens',require('./components/passport/PersonalAccessTokens.vue').default);

const app = new Vue({
    el: '#app',
    router,
    data() {
        return {
            user : window.user,
            config : {
                headers : {
                    Authorization: "Bearer " + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImIwN2E1ZTYwMTVjZWU5MDA1OTdjNzQ2ZDA3NjQxMTgwODM0YzI0YThhMzI3NjcxZWY4ZDgxNTVjMzMyMDUyMzYyZDg4ZjA1NTM5ODc0MzI3In0.eyJhdWQiOiIxIiwianRpIjoiYjA3YTVlNjAxNWNlZTkwMDU5N2M3NDZkMDc2NDExODA4MzRjMjRhOGEzMjc2NzFlZjhkODE1NWMzMzIwNTIzNjJkODhmMDU1Mzk4NzQzMjciLCJpYXQiOjE1NjE2Nzk3NjksIm5iZiI6MTU2MTY3OTc2OSwiZXhwIjoxNTkzMzAyMTY5LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.KGqzmR9Yhb4RKACnFz97_t1ecDJxcvx2Ptzc3knyRcf_SVCmSAgg_LjkUyX4PsVIJqTOKJQmO83OXlIjQ2tSiNll3zVB9ze5r31OCODweeDj4Xp96Ge8FAP_jqR-Z0yLlGjooAaP2K3DV5CGtN16fj8m39hucmxI4R-Z0DPFORgESqcefyzxIq9mU4VINj6_9Nz6nyWzj0JF3_VK0jvfNCdEwMr6nndgV3EN0-nn1DiP1lPxaPuh2ytCZLMOtUhB7OtanMXQwtgzvajELX2dSFsHUPA9at2-3OKmziHUpEDOunA4qvu7QnJED3f5uQeJw62wtaoQ5jIaRSP_22LEXBZOzKkOBvHO5yj8BA7Um8Ome9yIEkBH0Trl5I7-C5xrtZkMGojbWMQAPT5n-7sbuqOnVj4QCnHp2W4vmHJIouHcpTCjGnmrHyzJTflHZxTIcNdTUB3utGEGo-xsZX50kZLfo6jVBs-kYk3yw10RhdN0D848aGtDfZFLcKXVIDmXf3JvKRDCZPeb1UHbZNCELnL9Q7ssU0oI_iYNStCdCwLxf37kIGsTrGOGUgbROLbOgqb0YrmGUXLoKA6qb79ukR7vFW25uDzYF8M0mORoW4lxIcHUvHnvZVcQCWe3h7d2FZkJ7ObHZXa7Qi42WS3t7907Y4I7OxmYIhJffCm5WSQ',
                    'Content-Type' : 'application/json'
                }
            }
        }
    }
});
