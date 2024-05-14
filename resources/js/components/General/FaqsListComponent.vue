<template>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
            <h4 class="card-title mb-3">Frequently Ask Questions (FAQs)</h4>
        </div>
        <div class="col-md-8 offset-md-2 col-sm-12" v-if="faqs.length > 0">
            <div class="card" v-for="faq in faqs">
                <div class="card-body">
                    <ul class="notification-list m-0 p-0">
                        <li class="d-flex align-items-center justify-content-between">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <div class=" ms-3">
                                        <h6>{{faq.question}}</h6>
                                        <p class="mb-0">{{faq.answer}}</p>
                                    </div>
                                </div>  
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-sm-12" v-if="faqs.length <= 0">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <p class="mb-0">
                            <i class="icon material-symbols-outlined font-50">
                                search
                            </i>
                        </p>
                        <h5 class="mb-0">No Frequently Ask Questions Found</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Faq List Component mounted.')
        },
        created(){
            this.getAllFaqsListData()
        },
        data() {
            return {
                isLoading: false,
                faqs: {}
            }
        },
        methods: {
            getAllFaqsListData() {
                this.isLoading = true;
                axios.get('/get-all-faqs-list')
                .then(response => (
                    this.faqs = response.data.faqs
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
