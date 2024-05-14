<template>
    <div class="row">
        <div class="text-center" v-if="true">
            <div class="card py-5">
                <p class="mb-0">
                    <i class="icon material-symbols-outlined font-50">
                        search
                    </i>
                </p>
                <h5 class="mb-0">No Friends Found</h5>
            </div>
        </div>
        <div class="col-md-6" v-if="false">
            <div class="card card-block card-stretch card-height">
                <div class="card-body profile-page p-0">
                    <div class="profile-header-image">
                    <div class="cover-container">
                        <img src="/assets/images/page-img/profile-bg2.jpg" alt="profile-bg" class="rounded img-fluid w-100" loading="lazy">
                    </div>
                    <div class="profile-info p-4">
                        <div class="user-detail">
                            <div class="d-flex flex-wrap justify-content-between align-items-start">
                                <div class="profile-detail d-flex">
                                <div class="profile-img pe-4">
                                    <img src="/assets/images/user/05.jpg" alt="profile-img" loading="lazy" class="avatar-130 img-fluid" />
                                </div>
                                <div class="user-data-block mt-md-0 mt-2">
                                    <h4>
                                        <a href="friend-profile.html">Anna Sthesia</a>
                                    </h4>
                                    <h6>@designer</h6>
                                    <p class="mb-2 mb-md-0">Lorem Ipsum is simply dummy text of the</p>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Following</button>
                            </div>
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
            console.log('User Friends List Component mounted.')
        }
    }
</script>
