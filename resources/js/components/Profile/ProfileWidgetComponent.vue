<template>
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                    <img class="img-fluid rounded-circle avatar-130" :src="profile.user_info.profile_image" alt="profile-img">
                    <h4 class="mt-2">{{profile.user.first_name+' '+profile.user.last_name}}</h4>
                    <a href="#" class="mb-3">@{{profile.user.username}}</a>
                    <p v-if="profile.user_info.introduction != null">{{profile.user_info.introduction}}</p>
            </div>
            <div class="d-flex justify-content-evenly">
                <p class="mb-0">Follower</p>
                <p class="mb-0">Follow</p>
                <p class="mb-0">Posts</p>
            </div>
            <div class="d-flex justify-content-evenly">
                <h6 class="mb-0 fw-bold">{{profile.stats.followers}}</h6>
                <h6 class="mb-0 fw-bold">{{profile.stats.followings}}</h6>
                <h6 class="mb-0 fw-bold">{{profile.stats.posts}}</h6>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Profile Widget Component mounted.')
        },
        created(){
            this.getUserProfileData()
        },
        data() {
            return {
                isLoading: false,
                profile: {user_info : {}}
            }
        },
        methods: {
            getUserProfileData() {
                this.isLoading = true;
                axios.get('/get-user-profile-data')
                .then(response => (
                    this.profile = response.data.profile
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
