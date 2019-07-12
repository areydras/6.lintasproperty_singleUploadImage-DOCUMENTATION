<template>
    <div class="container pt-5">
        <div class="card" v-if="$gate.isAdmin()">
            <div class="card-body">
                <h4 class="card-title">Client Message</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(message, index) in messages.data" :key="index">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ message.name }}</td>
                                <td>{{ message.phone }}</td>
                                <td>{{ message.email }}</td>
                                <td>{{ message.message }}</td>
                                <td>
                                    <a @click="deleteMessage(message.id)" class="btn btn-danger text-white">Delete</a>
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
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messages : {}
                }
        },
        methods: {
            getMessages(){
                axios.get('/api/contact', this.$parent.config).then((res) => {
                    this.messages = res.data
                })
            },
            deleteMessage(id){
                axios.delete('/api/contact/' + id, this.$parent.config).then((res) => {
                    this.getMessages()
                    Swal.fire(
                        'Delete Success',
                        'You deleted ' + res.data.name,
                        'success'
                    )                    
                })
            }
        },
        mounted() {
            this.getMessages()
            console.log('Component mounted.')
        }
    }
</script>
