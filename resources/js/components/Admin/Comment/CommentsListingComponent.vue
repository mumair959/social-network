<template>
    <div class="col-md-8 offset-md-2 col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">Comments Management</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Description</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="comment in comments">
                                <td class="text-center">{{comment.title}}</td>
                                <td class="text-center">{{comment.description}}</td>
                                <td class="text-center">Action</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center" v-if="comments.length <= 0">
                    <p class="mb-0">
                        <i class="icon material-symbols-outlined font-50">
                            search
                        </i>
                    </p>
                    <h5 class="mb-0">No Comments Found</h5>
                </div>

                <nav v-if="comments.length > 0">
                    <ul class="pagination justify-content-center">
                      <li class="page-item" :class="{ 'link-disabled disabled' : prev_page_url == null}">
                        <button class="page-link" @click="getCommentListingData(prev_page_url)">Previous</button>
                      </li>
                      <li class="page-item" :class="{ 'link-disabled disabled' : next_page_url == null}">
                        <button class="page-link" @click="getCommentListingData(next_page_url)">Next</button>
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
            console.log('Comment Management Component mounted.')
        },
        created(){
            this.getCommentListingData()
        },
        data() {
            return {
                isLoading: false,
                next_page_url: null,
                prev_page_url: null,
                searchText: '',
                comments: {}
            }
        },
        methods: {
            getCommentListingData(url = null) {
                this.isLoading = true;

                let req_url = '/admin/get-all-comments';

                if(url != null){
                    let url_string = new URL(url);
                    req_url = req_url+'?page='+url_string.searchParams.get("page");
                }

                axios.get(req_url)
                .then(response => (
                    this.comments = response.data.comments.data,
                    this.next_page_url = response.data.comments.next_page_url,
                    this.prev_page_url = response.data.comments.prev_page_url
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
