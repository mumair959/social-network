<template>
    <div class="col-md-8 offset-md-2 col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">FAQs Management</h4>
                </div>
                <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#addFaqModal">Add New</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Question</th>
                                <th scope="col" class="text-center">Answer</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="faq in faqs">
                                <td class="text-center">{{faq.question}}</td>
                                <td class="text-center">{{faq.answer}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-warning" @click="EditFaq(faq)" data-bs-toggle="modal" data-bs-target="#editFaqModal">Edit</button>
                                    <button type="button" class="btn btn-sm bg-danger ml-10" @click="showAlertConfirm(faq.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center" v-if="faqs.length <= 0">
                    <p class="mb-0">
                        <i class="icon material-symbols-outlined font-50">
                            search
                        </i>
                    </p>
                    <h5 class="mb-0">No FAQs Found</h5>
                </div>

                <nav v-if="faqs.length > 0">
                    <ul class="pagination justify-content-center">
                      <li class="page-item" :class="{ 'link-disabled disabled' : prev_page_url == null}">
                        <button class="page-link" @click="getFaqListingData(prev_page_url)">Previous</button>
                      </li>
                      <li class="page-item" :class="{ 'link-disabled disabled' : next_page_url == null}">
                        <button class="page-link" @click="getFaqListingData(next_page_url)">Next</button>
                      </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Create Modal Start -->
        <div class="modal fade" id="addFaqModal" tabindex="-1" role="dialog" aria-labelledby="addFaqTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFaqTitle">Add New FAQ</h5>
                        <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close">
                        
                        </button>
                    </div>
                    <form @submit.prevent="createFaq">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label" for="question">Question:</label>
                                <input type="text" class="form-control" id="question" placeholder="Enter Question" v-model="faq.question">
                                <span class="error-text-class">{{(errors.question == undefined) ? '' : errors.question[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="answer">Answer</label>
                                <textarea class="form-control" id="answer" rows="4" placeholder="Enter Answer Here..." v-model="faq.answer"></textarea>
                                <span class="error-text-class">{{(errors.answer == undefined) ? '' : errors.answer[0]}}</span>
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
        <div class="modal fade" id="editFaqModal" tabindex="-1" role="dialog" aria-labelledby="editFaqTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editFaqTitle">Update FAQ</h5>
                        <button type="button" class="btn-close" id="update-close" data-bs-dismiss="modal" aria-label="Close">
                        
                        </button>
                    </div>
                    <form @submit.prevent="updateFaq">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label" for="question">Question:</label>
                                <input type="text" class="form-control" id="question" placeholder="Enter Question" v-model="update_faq.question">
                                <span class="error-text-class">{{(errors.question == undefined) ? '' : errors.question[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="answer">Answer</label>
                                <textarea class="form-control" id="answer" rows="4" placeholder="Enter Answer Here..." v-model="update_faq.answer"></textarea>
                                <span class="error-text-class">{{(errors.answer == undefined) ? '' : errors.answer[0]}}</span>
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
            console.log('FAQ Management Component mounted.')
        },
        created(){
            this.getFaqListingData()
        },
        data() {
            return {
                isLoading: false,
                next_page_url: null,
                prev_page_url: null,
                searchText: '',
                faqs: {},
                faq: {},
                update_faq: {},
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
                        this.deleteFaq(id);
                    }
                });
            },
            getFaqListingData(url = null) {
                this.isLoading = true;

                let req_url = '/admin/get-all-faqs';

                if(url != null){
                    let url_string = new URL(url);
                    req_url = req_url+'?page='+url_string.searchParams.get("page");
                }

                axios.get(req_url)
                .then(response => (
                    this.faqs = response.data.faqs.data,
                    this.next_page_url = response.data.faqs.next_page_url,
                    this.prev_page_url = response.data.faqs.prev_page_url
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            },
            createFaq() {
                this.errors = {};
                this.isLoading = true;
                axios.post('/admin/create-faq', this.faq)
                  .then(response => (
                      this.$swal('Great!',response.data.msg,'success'),
                      this.getFaqListingData(),
                      this.faq = {},
                      document.getElementById('close').click()
                  ))
                  .catch(err => (
                    this.errors = err.response.data.errors
                  ))
                  .finally(() => this.isLoading = false)
            },
            updateFaq() {
                this.errors = {};
                this.isLoading = true;
                axios.post('/admin/update-faq', this.update_faq)
                  .then(response => (
                      this.$swal('Great!',response.data.msg,'success'),
                      this.getFaqListingData(),
                      this.update_faq = {},
                      document.getElementById('update-close').click()
                  ))
                  .catch(err => (
                    this.errors = err.response.data.errors
                  ))
                  .finally(() => this.isLoading = false)
            },
            deleteFaq(id){
                this.isLoading = true;
                axios.post('/admin/delete-faq',{id})
                    .then(response => (
                        this.$swal('Great!',response.data.msg,'success'),
                        this.getFaqListingData()
                    ))
                    .catch(err => (
                        console.log(err)
                    ))
                    .finally(() => this.isLoading = false)
            },
            EditFaq(faq){
              this.update_faq = faq;
            },
        }
    }
</script>
