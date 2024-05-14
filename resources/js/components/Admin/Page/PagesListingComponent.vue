<template>
    <div class="col-md-8 offset-md-2 col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">Pages Management</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Description</th>
                                <th scope="col" class="text-center">Created By</th>
                                <th scope="col" class="text-center">Logo</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="page in pages">
                                <td class="text-center">{{page.title}}</td>
                                <td class="text-center">{{page.description}}</td>
                                <td class="text-center">{{page.created_by.first_name+' '+page.created_by.last_name}}</td>
                                <td class="text-center">
                                    <img :src="page.logo_image" class="img-fluid rounded-circle me-3 profile-img-listing" alt="page" loading="lazy">
                                </td>
                                <td class="text-center">
                                    <label v-if="page.status == 'Active'" class="label-success">
                                        {{page.status}}
                                    </label>
                                    <label v-if="page.status == 'Blocked'" class="label-danger">
                                        {{page.status}}
                                    </label>
                                </td>
                                <td class="text-center">
                                    <button v-if="page.status == 'Active'" type="button" @click="updateStatus(page.id,'Blocked')" class="btn btn-sm btn-danger">
                                        Block
                                    </button>
                                    <button v-if="page.status == 'Blocked'" type="button" @click="updateStatus(page.id,'Active')" class="btn btn-sm btn-success">
                                        Activate
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center" v-if="pages.length <= 0">
                    <p class="mb-0">
                        <i class="icon material-symbols-outlined font-50">
                            search
                        </i>
                    </p>
                    <h5 class="mb-0">No Pages Found</h5>
                </div>

                <nav v-if="pages.length > 0">
                    <ul class="pagination justify-content-center">
                      <li class="page-item" :class="{ 'link-disabled disabled' : prev_page_url == null}">
                        <button class="page-link" @click="getPageListingData(prev_page_url)">Previous</button>
                      </li>
                      <li class="page-item" :class="{ 'link-disabled disabled' : next_page_url == null}">
                        <button class="page-link" @click="getPageListingData(next_page_url)">Next</button>
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
            console.log('Page Management Component mounted.')
        },
        created(){
            this.getPageListingData()
        },
        data() {
            return {
                isLoading: false,
                next_page_url: null,
                prev_page_url: null,
                searchText: '',
                pages: {}
            }
        },
        methods: {
            getPageListingData(url = null) {
                this.isLoading = true;
                let req_url = '/admin/get-all-pages';

                if(url != null){
                    let url_string = new URL(url);
                    req_url = req_url+'?page='+url_string.searchParams.get("page");
                }

                axios.get(req_url)
                .then(response => (
                    this.pages = response.data.pages.data,
                    this.next_page_url = response.data.pages.next_page_url,
                    this.prev_page_url = response.data.pages.prev_page_url
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
                axios.post('/admin/update-page-status', params)
                  .then(response => (
                      this.$swal('Great!',response.data.msg,'success'),
                      this.getPageListingData()
                  ))
                  .catch(err => (
                    this.errors = err.response.data.errors
                  ))
                  .finally(() => this.isLoading = false)
            },
        }
    }
</script>
