<template>
    <div class="col-md-8 offset-md-2 col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">Users Management</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Username</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Profile Image</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users">
                                <td class="text-center">{{user.first_name+' '+user.last_name}}</td>
                                <td class="text-center">{{user.username}}</td>
                                <td class="text-center">{{user.email}}</td>
                                <td class="text-center">
                                    <img :src="user.user_info.profile_image" class="img-fluid rounded-circle me-3 profile-img-listing" alt="user" loading="lazy">
                                </td>
                                <td class="text-center">
                                    <label v-if="user.status == 'Active'" class="label-success">
                                        {{user.status}}
                                    </label>
                                    <label v-if="user.status == 'Blocked'" class="label-danger">
                                        {{user.status}}
                                    </label>
                                </td>
                                <td class="text-center">
                                    <button v-if="user.status == 'Active'" type="button" @click="updateStatus(user.id,'Blocked')" class="btn btn-sm btn-danger">
                                        Block
                                    </button>
                                    <button v-if="user.status == 'Blocked'" type="button" @click="updateStatus(user.id,'Active')" class="btn btn-sm btn-success">
                                        Activate
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center" v-if="users.length <= 0">
                    <p class="mb-0">
                        <i class="icon material-symbols-outlined font-50">
                            search
                        </i>
                    </p>
                    <h5 class="mb-0">No Users Found</h5>
                </div>

                <nav v-if="users.length > 0">
                    <ul class="pagination justify-content-center">
                      <li class="page-item" :class="{ 'link-disabled disabled' : prev_page_url == null}">
                        <button class="page-link" @click="getUserListingData(prev_page_url)">Previous</button>
                      </li>
                      <li class="page-item" :class="{ 'link-disabled disabled' : next_page_url == null}">
                        <button class="page-link" @click="getUserListingData(next_page_url)">Next</button>
                      </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('User Management Component mounted.')
        },
        created(){
            this.getUserListingData()
        },
        data() {
            return {
                isLoading: false,
                next_page_url: null,
                prev_page_url: null,
                searchText: '',
                users: {}
            }
        },
        methods: {
            getUserListingData(url = null) {
                this.isLoading = true;

                let req_url = '/admin/get-all-users';

                if(url != null){
                    let url_string = new URL(url);
                    req_url = req_url+'?page='+url_string.searchParams.get("page");
                }

                axios.get(req_url)
                .then(response => (
                    this.users = response.data.users.data,
                    this.next_page_url = response.data.users.next_page_url,
                    this.prev_page_url = response.data.users.prev_page_url
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            },
            updateStatus(id,status) {
                this.errors = {};
                this.isLoading = true;
                let params = {id, status}
                axios.post('/admin/update-user-status', params)
                  .then(response => (
                      this.$swal('Great!',response.data.msg,'success'),
                      this.getUserListingData()
                  ))
                  .catch(err => (
                    this.errors = err.response.data.errors
                  ))
                  .finally(() => this.isLoading = false)
            },
        }
    }
</script>
