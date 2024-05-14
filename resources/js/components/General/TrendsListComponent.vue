<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Trends For You</h4>
            </div>
        <i class="material-symbols-outlined md-18">settings</i>
        </div>
        <div class="card-body">
            <div class="text-center" v-if="trends.length <= 0">
                <p class="mb-0">
                    <i class="icon material-symbols-outlined font-50">
                        search
                    </i>
                </p>
                <h6 class="mb-0">No Trends Found</h6>
            </div>

            <div v-if="trends.length > 0">
                <div class="d-flex p-2 border-bottom align-items-center" v-for="trend in trends">
                    <div class="flex-grow-1">
                    <h6>{{trend.name}}</h6>
                    <p class="mb-0">{{trend.posts_count}} Posts</p>
                    </div>
                </div>
            </div>
            <div class="text-center p-2" v-if="trends.length > 0 && total_trends > trends.length">
                <a href="javascript:void(0)" @click="getTopTrendsData()" class="mb-0 font-weight-bold">SEE MORE</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Trends List Component mounted.')
        },
        created(){
            this.getTopTrendsData()
        },
        data() {
            return {
                isLoading: false,
                total_trends: 0,
                trends: {}
            }
        },
        methods: {
            getTopTrendsData() {
                this.isLoading = true;
                axios.get('/get-top-tags-list',{params : {take : this.trends.length}})
                .then(response => (
                    this.trends = response.data.tags,
                    this.total_trends = response.data.total_tags
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
