<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body profile-page p-0">
                <div class="profile-header">
                    <div class="position-relative">
                        <img :src="profile.user_info.banner_image" alt="profile-bg" class="rounded img-fluid w-100-per" loading="lazy">
                        <!-- <ul class="header-nav list-inline d-flex flex-wrap justify-end p-0 m-0">
                            <li><a href="#" class="material-symbols-outlined">
                            edit
                            </a>
                            </li>
                        </ul> -->
                    </div>
                    <div class="user-detail text-center mb-3">
                        <div class="profile-img">
                            <img :src="profile.user_info.profile_image" alt="profile-img" class="avatar-130 img-fluid" loading="lazy">
                        </div>
                        <div class="profile-detail">
                            <h3 class="">{{profile.user.first_name+' '+profile.user.last_name}}</h3>
                        </div>
                    </div>
                    <div class="profile-info p-3 d-flex align-items-center justify-content-between position-relative">
                        <div class="social-links">
                            <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                <li class="text-center pe-3" v-if="profile.user_info.facebook != null">
                                    <a href="#"><img src="/assets/images/icon/08.png" class="img-fluid rounded" alt="facebook" loading="lazy"></a>
                                </li>
                                <li class="text-center pe-3" v-if="profile.user_info.twitter != null">
                                    <a href="#"><img src="/assets/images/icon/09.png" class="img-fluid rounded" alt="Twitter" loading="lazy"></a>
                                </li>
                                <li class="text-center pe-3" v-if="profile.user_info.instagram != null">
                                    <a href="#"><img src="/assets/images/icon/10.png" class="img-fluid rounded" alt="Instagram" loading="lazy"></a>
                                </li>
                                <li class="text-center pe-3" v-if="profile.user_info.google != null">
                                    <a href="#"><img src="/assets/images/icon/11.png" class="img-fluid rounded" alt="Google plus" loading="lazy"></a>
                                </li>
                                <li class="text-center pe-3" v-if="profile.user_info.youtube != null">
                                    <a href="#"><img src="/assets/images/icon/12.png" class="img-fluid rounded" alt="You tube" loading="lazy"></a>
                                </li>
                                <li class="text-center md-pe-3 pe-0" v-if="profile.user_info.linkedin != null">
                                    <a href="#"><img src="/assets/images/icon/13.png" class="img-fluid rounded" alt="linkedin" loading="lazy"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-info">
                            <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                            <li class="text-center ps-3">
                                <h6>Posts</h6>
                                <p class="mb-0">{{profile.stats.posts}}</p>
                            </li>
                            <li class="text-center ps-3">
                                <h6>Followers</h6>
                                <p class="mb-0">{{profile.stats.followers}}</p>
                            </li>
                            <li class="text-center ps-3">
                                <h6>Following</h6>
                                <p class="mb-0">{{profile.stats.followings}}</p>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Profile Header Component mounted.')
        },
        created(){
            this.getUserProfileData()
        },
        data() {
            return {
                isLoading: false,
                profile: {user_info : {}, user : {}, stats : {}}
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
