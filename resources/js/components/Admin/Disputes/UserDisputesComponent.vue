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
                        <tr v-for="reported_user in reported_users">
                            <td class="text-center">{{reported_user.report_issue}}</td>
                            <td class="text-center">{{reported_user.report_result}}</td>
                            <td class="text-center">{{reported_user.reported_by.first_name+' '+reported_user.reported_by.last_name}}</td>
                            <td class="text-center">
                                <label v-if="reported_user.status == 'Pending'" class="label-primary">
                                    {{reported_user.status}}
                                </label>
                                <label v-if="reported_user.status == 'Review'" class="label-warning">
                                    {{reported_user.status}}
                                </label>
                                <label v-if="reported_user.status == 'Approved'" class="label-success">
                                    {{reported_user.status}}
                                </label>
                                <label v-if="reported_user.status == 'Rejected'" class="label-danger">
                                    {{reported_user.status}}
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

            <div class="text-center" v-if="reported_users.length <= 0">
                <p class="mb-0">
                    <i class="icon material-symbols-outlined font-50">
                        search
                    </i>
                </p>
                <h5 class="mb-0">No User Disputes Found</h5>
            </div>

            <nav v-if="reported_users.length > 0">
                <ul class="pagination justify-content-center">
                  <li class="page-item" :class="{ 'link-disabled disabled' : prev_page_url == null}">
                    <button class="page-link" @click="getUserDisputesListingData(prev_page_url)">Previous</button>
                  </li>
                  <li class="page-item" :class="{ 'link-disabled disabled' : next_page_url == null}">
                    <button class="page-link" @click="getUserDisputesListingData(next_page_url)">Next</button>
                  </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('User Disputes Component mounted.')
        },
        created(){
            this.getUserDisputesListingData()
        },
        data() {
            return {
                isLoading: false,
                next_page_url: null,
                prev_page_url: null,
                searchText: '',
                reported_users: {}
            }
        },
        methods: {
            getUserDisputesListingData(url = null) {
                this.isLoading = true;

                let req_url = '/admin/get-all-users-disputes';

                if(url != null){
                    let url_string = new URL(url);
                    req_url = req_url+'?page='+url_string.searchParams.get("page");
                }

                axios.get(req_url)
                .then(response => (
                    this.reported_users = response.data.reported_users.data,
                    this.next_page_url = response.data.reported_users.next_page_url,
                    this.prev_page_url = response.data.reported_users.prev_page_url
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
