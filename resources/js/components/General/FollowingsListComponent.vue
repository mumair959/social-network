<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Who to follow</h4>
            </div>
            <i class="material-symbols-outlined md-16">shortcut</i>
        </div>
        <div class="card-body">
            <div class="text-center" v-if="followings.length <= 0">
                <p class="mb-0">
                    <i class="icon material-symbols-outlined font-50">
                        search
                    </i>
                </p>
                <h6 class="mb-0">No Recommendations Found</h6>
            </div>
            <ul class="list-inline m-0 p-0" v-if="followings.length > 0">
                <li class="d-flex mb-3 align-items-center" v-for="following in followings">
                <img class="img-fluid rounded-circle avatar-40" :src="following.user_info.profile_image" alt="" loading="lazy">
                <div class="ms-2 flex-grow-1">
                    <h6 class="d-flex align-items-center frd-name">{{following.first_name+' '+following.last_name}} <i class="material-symbols-outlined ms-1 text-primary md-14">
                        check_circle
                        </i></h6>
                    <small>@{{following.username}}</small>
                </div>
                <a href="javascript:void(0)" @click="followUser(following.id)" class="btn bg-soft-primary smallbutton">follow</a>
                </li>
            </ul>
            <div class="text-center p-2" v-if="followings.length > 0 && total_followings > followings.length">
                <a href="javascript:void(0)" @click="getFollowingsRecommendationData()" class="mb-0 font-weight-bold">SEE MORE</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Followings List Component mounted.')
        },
        created(){
            this.getFollowingsRecommendationData()
        },
        data() {
            return {
                isLoading: false,
                total_followings: 0,
                followings: {}
            }
        },
        methods: {
            getFollowingsRecommendationData() {
                this.isLoading = true;
                axios.get('/get-followings-recommendations',{params : {take : this.followings.length}})
                .then(response => (
                    this.followings = response.data.followings,
                    this.total_followings = response.data.total_followings
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            },
            followUser(following_id) {
                this.isLoading = true;
                axios.post('/follow-user', {following_id})
                .then(response => (
                    this.getFollowingsRecommendationData()
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
