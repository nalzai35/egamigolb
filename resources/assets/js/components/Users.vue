<template>
    <div class="">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" @click.prevent="remove(user)">delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination">
            <li v-if="pages.current_page === 1" class="page-item disabled">
                <button class="page-link">&laquo;</button>
            </li>
            <li v-else class="page-item">
                <button class="page-link" v-on:click="fetchPaginateUsers(pages.prev_page_url)">&laquo;</button>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">{{ pages.current_page }} - {{ pages.last_page }}</a>
            </li>

            <li v-if="pages.last_page === pages.current_page" class="page-item disabled">
                <button class="page-link">&raquo;</button>
            </li>
            <li v-else class="page-item">
                <button class="page-link" v-on:click="fetchPaginateUsers(pages.next_page_url)">&raquo;</button>
            </li>
        </ul>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.getUsers()
        },
        data () {
            return {
                users: [],
                pages: [],
                url: '/back/users',

            }
        },
        methods: {
            getUsers() {
                axios.get(this.url)
                    .then((res) => {
                        this.users = res.data.data
                        this.pages = res.data
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            fetchPaginateUsers(url) {
                this.url = url
                this.getUsers()
            },
            removeUser(user) {
                axios.delete(`/back/users/${user.id}`)
                    .then((res) => {
                        const userIndex = this.users.indexOf(user)
                        this.users.splice(userIndex, 1)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            remove(user){
                var txt
                var r = confirm("Apakah anda ingin menghapusnya..??")
                if (r == true) {
                    this.removeUser(user)
                    txt = "User telah terhapus!"
                } else {
                    txt = "Batal menghapus user!"
                }
            }
        }
    }
</script>
