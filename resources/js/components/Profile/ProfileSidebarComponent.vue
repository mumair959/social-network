<template>
    <div class="col-md-4 col-lg-4">
        <div class="card">
            <div class="card-body p-0">
            <div class="user-tabing">
                <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                    <li class="nav-item col-12 col-sm-3 p-0">
                        <a class="nav-link active" href="#Abouts" data-bs-toggle="pill" data-bs-target="#Abouts" role="button">Abouts</a>
                    </li>
                    <li class="nav-item col-12 col-sm-3 p-0">
                        <a class="nav-link" href="#Followers" data-bs-toggle="pill" data-bs-target="#Followers" role="button">Followers</a>
                    </li>
                    <li class="nav-item col-12 col-sm-3 p-0">
                        <a class="nav-link" href="#Followings" data-bs-toggle="pill" data-bs-target="#Followings" role="button">Followings</a>
                    </li>
                    <li class="nav-item col-12 col-sm-3 p-0">
                        <a class="nav-link" href="#Photos" data-bs-toggle="pill" data-bs-target="#Photos" role="button">Photos</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="Photos" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Photos</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="profile-img-gallary p-0 m-0 list-unstyled" v-if="summary.photos.length > 0">
                            <li class="">
                                <a data-fslightbox="gallery" href="/assets/images/page-img/g1.jpg">
                                    <img src="/assets/images/page-img/g1.jpg" class="img-fluid" alt="photo-profile" loading="lazy">
                                </a>
                            </li>
                        </ul>
                        <div class="text-center" v-if="summary.photos.length <= 0">
                            <p class="mb-0">
                                <i class="icon material-symbols-outlined font-50">
                                    search
                                </i>
                            </p>
                            <h5 class="mb-0">No Photos Found</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="Abouts" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Intro</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="material-symbols-outlined">
                            watch_later
                            </span>
                            <span class="ms-2">Joined {{summary.joined}}</span>
                        </div>
                        <div class="mt-2">
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary" href="/edit-profile">Edit Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>Contact Information</h4>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                            <h6>Email</h6>
                            </div>
                            <div class="col-9">
                            <a href="#" class="mb-0">{{summary.basic_info.user.email}}</a>
                            </div>
                            <div class="col-3">
                                <h6>Mobile</h6>
                            </div>
                            <div class="col-9">
                                <p class="mb-0" v-if="summary.basic_info.contact_no == null">N/A</p>
                                <p class="mb-0" v-if="summary.basic_info.contact_no != null">{{summary.basic_info.contact_no}}</p>
                            </div>
                            <div class="col-3">
                                <h6>Location</h6>
                            </div>
                            <div class="col-9">
                                <p class="mb-0" v-if="summary.basic_info.city == null">N/A</p>
                                <p class="mb-0" v-if="summary.basic_info.city != null">{{summary.basic_info.city.name}}, {{summary.basic_info.country.name}}</p>
                            </div>
                        </div>
                        <h4 class="mt-3">Basic Information</h4>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <h6>Birth Date</h6>
                            </div>
                            <div class="col-8">
                                <p class="mb-0" v-if="summary.basic_info.date_of_birth == null">N/A</p>
                                <p class="mb-0" v-if="summary.basic_info.date_of_birth != null">{{summary.basic_info.date_of_birth}}</p>
                            </div>
                            <div class="col-4">
                                <h6>Birth Year</h6>
                            </div>
                            <div class="col-8">
                                <p class="mb-0" v-if="summary.basic_info.year_of_birth == null">N/A</p>
                                <p class="mb-0" v-if="summary.basic_info.year_of_birth != null">{{summary.basic_info.year_of_birth}}</p>
                            </div>
                            <div class="col-4">
                                <h6>Gender</h6>
                            </div>
                            <div class="col-8">
                                <p class="mb-0" v-if="summary.basic_info.gender == null">N/A</p>
                                <p class="mb-0" v-if="summary.basic_info.gender != null">{{summary.basic_info.gender}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="Followers" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Followers</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="request-list list-inline m-0 p-0" v-if="summary.followers.length > 0">
                            <li class="d-flex align-items-center  flex-wrap">
                                <div class="user-img img-fluid flex-shrink-0">
                                    <img src="/assets/images/user/13.jpg" alt="story-img" class="rounded-circle avatar-40">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>Paul Misunday</h6>
                                    <p class="mb-0">6  followers</p>
                                </div>
                                <div class="d-flex align-items-center mt-2 mt-md-0">
                                    <a href="#" class=" btn btn-primary rounded">Follow</a>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center" v-if="summary.followers.length <= 0">
                            <p class="mb-0">
                                <i class="icon material-symbols-outlined font-50">
                                    search
                                </i>
                            </p>
                            <h6 class="mb-0">No Followers Found</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="Followings" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Followings</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="request-list list-inline m-0 p-0" v-if="summary.followings.length > 0">
                            <li class="d-flex align-items-center flex-wrap" v-for="following in summary.followings">
                                <div class="user-img img-fluid flex-shrink-0">
                                    <img :src="following.user_info.profile_image" alt="story-img" class="rounded-circle avatar-40">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>{{following.first_name+' '+following.last_name}}</h6>
                                    <p class="mb-0">{{following.followers_count}} followers</p>
                                </div>
                                <div class="d-flex align-items-center mt-2 mt-md-0">
                                    <a href="javascript:void(0)" @click="unfollowUser(following.id)" class=" btn btn-primary rounded">Unfollow</a>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center" v-if="summary.followings.length <= 0">
                            <p class="mb-0">
                                <i class="icon material-symbols-outlined font-50">
                                    search
                                </i>
                            </p>
                            <h6 class="mb-0">No Followers Found</h6>
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
            console.log('Profile Sidebar Component mounted.')
        },
        created(){
            this.getUserProfileSummary()
        },
        data() {
            return {
                isLoading: false,
                summary: {followers : [], followings : [], photos : [], basic_info : {user : {}}}
            }
        },
        methods: {
            getUserProfileSummary() {
                this.isLoading = true;
                axios.get('/get-user-profile-summary')
                .then(response => (
                    this.summary = response.data.summary
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            },
            unfollowUser(following_id) {
                this.isLoading = true;
                axios.post('/unfollow-user', {following_id})
                .then(response => (
                    this.getUserProfileSummary()
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
