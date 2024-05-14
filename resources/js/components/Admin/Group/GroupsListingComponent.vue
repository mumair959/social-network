<template>
    <div class="col-md-8 offset-md-2 col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">Groups Management</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="group in groups">
                                <td>{{group.title}}</td>
                                <td>{{group.description}}</td>
                                <td>{{group.created_by.first_name+' '+group.created_by.last_name}}</td>
                                <td>
                                    <img :src="group.logo_image" class="img-fluid rounded-circle me-3 profile-img-listing" alt="group" loading="lazy">
                                </td>
                                <td>
                                    <label v-if="group.status == 'Active'" class="label-success">
                                        {{group.status}}
                                    </label>
                                    <label v-if="group.status == 'Blocked'" class="label-danger">
                                        {{group.status}}
                                    </label>
                                </td>
                                <td>
                                    <button v-if="group.status == 'Active'" type="button" @click="updateStatus(group.id,'Blocked')" class="btn btn-sm btn-danger">
                                        Block
                                    </button>
                                    <button v-if="group.status == 'Blocked'" type="button" @click="updateStatus(group.id,'Active')" class="btn btn-sm btn-success">
                                        Activate
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center" v-if="groups.length <= 0">
                    <p class="mb-0">
                        <i class="icon material-symbols-outlined font-50">
                            search
                        </i>
                    </p>
                    <h5 class="mb-0">No Groups Found</h5>
                </div>

                <nav v-if="groups.length > 0">
                    <ul class="pagination justify-content-center">
                      <li class="page-item" :class="{ 'link-disabled disabled' : prev_page_url == null}">
                        <button class="page-link" @click="getGroupListingData(prev_page_url)">Previous</button>
                      </li>
                      <li class="page-item" :class="{ 'link-disabled disabled' : next_page_url == null}">
                        <button class="page-link" @click="getGroupListingData(next_page_url)">Next</button>
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
            console.log('Group Management Component mounted.')
        },
        created(){
            this.getGroupListingData()
        },
        data() {
            return {
                isLoading: false,
                next_page_url: null,
                prev_page_url: null,
                searchText: '',
                groups: {}
            }
        },
        methods: {
            getGroupListingData(url = null) {
                this.isLoading = true;

                let req_url = '/admin/get-all-groups';

                if(url != null){
                    let url_string = new URL(url);
                    req_url = req_url+'?page='+url_string.searchParams.get("page");
                }

                axios.get(req_url)
                .then(response => (
                    this.groups = response.data.groups.data,
                    this.next_page_url = response.data.groups.next_page_url,
                    this.prev_page_url = response.data.groups.prev_page_url
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
                axios.post('/admin/update-group-status', params)
                  .then(response => (
                      this.$swal('Great!',response.data.msg,'success'),
                      this.getGroupListingData()
                  ))
                  .catch(err => (
                    this.errors = err.response.data.errors
                  ))
                  .finally(() => this.isLoading = false)
            },
        }
    }
</script>
