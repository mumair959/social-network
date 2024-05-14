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
                        <tr v-for="reported_post in reported_posts">
                            <td class="text-center">{{reported_post.report_issue}}</td>
                            <td class="text-center">{{reported_post.report_result}}</td>
                            <td class="text-center">{{reported_post.reported_by.first_name+' '+reported_post.reported_by.last_name}}</td>
                            <td class="text-center">
                                <label v-if="reported_post.status == 'Pending'" class="label-primary">
                                    {{reported_post.status}}
                                </label>
                                <label v-if="reported_post.status == 'Review'" class="label-warning">
                                    {{reported_post.status}}
                                </label>
                                <label v-if="reported_post.status == 'Approved'" class="label-success">
                                    {{reported_post.status}}
                                </label>
                                <label v-if="reported_post.status == 'Rejected'" class="label-danger">
                                    {{reported_post.status}}
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

            <div class="text-center" v-if="reported_posts.length <= 0">
                <p class="mb-0">
                    <i class="icon material-symbols-outlined font-50">
                        search
                    </i>
                </p>
                <h5 class="mb-0">No Post Disputes Found</h5>
            </div>

            <nav v-if="reported_posts.length > 0">
                <ul class="pagination justify-content-center">
                  <li class="page-item" :class="{ 'link-disabled disabled' : prev_page_url == null}">
                    <button class="page-link" @click="getPostDisputesListingData(prev_page_url)">Previous</button>
                  </li>
                  <li class="page-item" :class="{ 'link-disabled disabled' : next_page_url == null}">
                    <button class="page-link" @click="getPostDisputesListingData(next_page_url)">Next</button>
                  </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Post Disputes Component mounted.')
        },
        created(){
            this.getPostDisputesListingData()
        },
        data() {
            return {
                isLoading: false,
                next_page_url: null,
                prev_page_url: null,
                searchText: '',
                reported_posts: {}
            }
        },
        methods: {
            getPostDisputesListingData(url = null) {
                this.isLoading = true;

                let req_url = '/admin/get-all-posts-disputes';

                if(url != null){
                    let url_string = new URL(url);
                    req_url = req_url+'?page='+url_string.searchParams.get("page");
                }

                axios.get(req_url)
                .then(response => (
                    this.reported_posts = response.data.reported_posts.data,
                    this.next_page_url = response.data.reported_posts.next_page_url,
                    this.prev_page_url = response.data.reported_posts.prev_page_url
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
