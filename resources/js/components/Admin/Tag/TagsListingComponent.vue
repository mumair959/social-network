<template>
    <div class="col-md-8 offset-md-2 col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Tags Management</h4>
                </div>
                <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#addTagModal">Add New</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="tag in tags">
                                <td class="text-center">{{tag.name}}</td>
                                <td class="text-center">
                                    <label v-if="tag.status == 'Active'" class="label-success">
                                        {{tag.status}}
                                    </label>
                                    <label v-if="tag.status == 'Blocked'" class="label-danger">
                                        {{tag.status}}
                                    </label>
                                </td>
                                <td class="text-center">
                                    <button v-if="tag.status == 'Active'" type="button" @click="updateStatus(tag.id,'Blocked')" class="btn btn-sm btn-danger">
                                        Block
                                    </button>
                                    <button v-if="tag.status == 'Blocked'" type="button" @click="updateStatus(tag.id,'Active')" class="btn btn-sm btn-success">
                                        Activate
                                    </button>
                                    <button type="button" class="btn btn-sm btn-warning ml-10" @click="EditTag(tag)" data-bs-toggle="modal" data-bs-target="#editTagModal">Edit</button>
                                    <button type="button" class="btn btn-sm bg-danger ml-10" @click="showAlertConfirm(tag.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center" v-if="tags.length <= 0">
                    <p class="mb-0">
                        <i class="icon material-symbols-outlined font-50">
                            search
                        </i>
                    </p>
                    <h5 class="mb-0">No Tags Found</h5>
                </div>

                <nav v-if="tags.length > 0">
                    <ul class="pagination justify-content-center">
                      <li class="page-item" :class="{ 'link-disabled disabled' : prev_page_url == null}">
                        <button class="page-link" @click="getTagListingData(prev_page_url)">Previous</button>
                      </li>
                      <li class="page-item" :class="{ 'link-disabled disabled' : next_page_url == null}">
                        <button class="page-link" @click="getTagListingData(next_page_url)">Next</button>
                      </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Create Modal Start -->
        <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="addTagTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTagTitle">Add New Tag</h5>
                        <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close">
                        
                        </button>
                    </div>
                    <form @submit.prevent="createTag">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label" for="name">Tag Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Tag Nane" v-model="tag.name">
                                <span class="error-text-class">{{(errors.name == undefined) ? '' : errors.name[0]}}</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Create Modal End -->

        <!-- Update Modal Start -->
        <div class="modal fade" id="editTagModal" tabindex="-1" role="dialog" aria-labelledby="editTagTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTagTitle">Update Tag</h5>
                        <button type="button" class="btn-close" id="update-close" data-bs-dismiss="modal" aria-label="Close">
                        
                        </button>
                    </div>
                    <form @submit.prevent="updateTag">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label" for="name">Tag Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Tag Name" v-model="update_tag.name">
                                <span class="error-text-class">{{(errors.name == undefined) ? '' : errors.name[0]}}</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
               </div>
            </div>
        </div>
        <!-- Update Modal End -->
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Tag Management Component mounted.')
        },
        created(){
            this.getTagListingData()
        },
        data() {
            return {
                isLoading: false,
                next_page_url: null,
                prev_page_url: null,
                searchText: '',
                tags: {},
                tag: {},
                update_tag: {},
                errors: {}
            }
        },
        methods: {
            showAlertConfirm(id){
                this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.deleteTag(id);
                    }
                });
            },
            getTagListingData(url = null) {
                this.isLoading = true;
                let req_url = '/admin/get-all-tags';

                if(url != null){
                    let url_string = new URL(url);
                    req_url = req_url+'?page='+url_string.searchParams.get("page");
                }

                axios.get(req_url)
                .then(response => (
                    this.tags = response.data.tags.data,
                    this.next_page_url = response.data.tags.next_page_url,
                    this.prev_page_url = response.data.tags.prev_page_url
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
                axios.post('/admin/update-tag-status', params)
                  .then(response => (
                      this.$swal('Great!',response.data.msg,'success'),
                      this.getTagListingData()
                  ))
                  .catch(err => (
                    this.errors = err.response.data.errors
                  ))
                  .finally(() => this.isLoading = false)
            },
            createTag() {
                this.errors = {};
                this.isLoading = true;
                axios.post('/admin/create-tag', this.tag)
                  .then(response => (
                      this.$swal('Great!',response.data.msg,'success'),
                      this.getTagListingData(),
                      this.tag = {},
                      document.getElementById('close').click()
                  ))
                  .catch(err => (
                    this.errors = err.response.data.errors
                  ))
                  .finally(() => this.isLoading = false)
            },
            updateTag() {
                this.errors = {};
                this.isLoading = true;
                axios.post('/admin/update-tag', this.update_tag)
                  .then(response => (
                      this.$swal('Great!',response.data.msg,'success'),
                      this.getTagListingData(),
                      this.update_tag = {},
                      document.getElementById('update-close').click()
                  ))
                  .catch(err => (
                    this.errors = err.response.data.errors
                  ))
                  .finally(() => this.isLoading = false)
            },
            deleteTag(id){
                this.isLoading = true;
                axios.post('/admin/delete-tag',{id})
                    .then(response => (
                        this.$swal('Great!',response.data.msg,'success'),
                        this.getTagListingData()
                    ))
                    .catch(err => (
                        console.log(err)
                    ))
                    .finally(() => this.isLoading = false)
            },
            EditTag(tag){
              this.update_tag = tag;
            },
        }
    }
</script>
