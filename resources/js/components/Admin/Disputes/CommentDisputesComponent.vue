<template>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Issue Reported</th>
                            <th scope="col" class="text-center">Reported By</th>
                            <th scope="col" class="text-center">Action Taken</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="reported_comment in reported_comments">
                            <td class="text-center">{{reported_comment.report_issue}}</td>
                            <td class="text-center">{{reported_comment.report_result}}</td>
                            <td class="text-center">{{reported_comment.reported_by.first_name+' '+reported_comment.reported_by.last_name}}</td>
                            <td class="text-center">
                                <label v-if="reported_comment.status == 'Pending'" class="label-primary">
                                    {{reported_comment.status}}
                                </label>
                                <label v-if="reported_comment.status == 'Review'" class="label-warning">
                                    {{reported_comment.status}}
                                </label>
                                <label v-if="reported_comment.status == 'Approved'" class="label-success">
                                    {{reported_comment.status}}
                                </label>
                                <label v-if="reported_comment.status == 'Rejected'" class="label-danger">
                                    {{reported_comment.status}}
                                </label>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn mt-10-neg btn-success">
                                    Update
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center" v-if="reported_comments.length <= 0">
                <p class="mb-0">
                    <i class="icon material-symbols-outlined font-50">
                        search
                    </i>
                </p>
                <h5 class="mb-0">No Comment Disputes Found</h5>
            </div>

            <nav v-if="reported_comments.length > 0">
                <ul class="pagination justify-content-center">
                  <li class="page-item" :class="{ 'link-disabled disabled' : prev_page_url == null}">
                    <button class="page-link" @click="getCommentDisputesListingData(prev_page_url)">Previous</button>
                  </li>
                  <li class="page-item" :class="{ 'link-disabled disabled' : next_page_url == null}">
                    <button class="page-link" @click="getCommentDisputesListingData(next_page_url)">Next</button>
                  </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Comment Disputes Component mounted.')
        },
        created(){
            this.getCommentDisputesListingData()
        },
        data() {
            return {
                isLoading: false,
                next_page_url: null,
                prev_page_url: null,
                searchText: '',
                reported_comments: {}
            }
        },
        methods: {
            getCommentDisputesListingData(url = null) {
                this.isLoading = true;

                let req_url = '/admin/get-all-comments-disputes';

                if(url != null){
                    let url_string = new URL(url);
                    req_url = req_url+'?page='+url_string.searchParams.get("page");
                }

                axios.get(req_url)
                .then(response => (
                    this.reported_comments = response.data.reported_comments.data,
                    this.next_page_url = response.data.reported_comments.next_page_url,
                    this.prev_page_url = response.data.reported_comments.prev_page_url
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
