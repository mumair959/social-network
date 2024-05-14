<template>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
            <h4 class="card-title mb-3">Notifications</h4>
        </div>
        <div class="col-md-8 offset-md-2 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center" v-if="true">
                        <p class="mb-0">
                            <i class="icon material-symbols-outlined font-50">
                                search
                            </i>
                        </p>
                        <h5 class="mb-0">No Notifications Found</h5>
                    </div>
                    <ul class="notification-list m-0 p-0" v-if="false">
                        <li class="d-flex align-items-center justify-content-between">
                            <div class="user-img img-fluid"><img src="/assets/images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <div class=" ms-3">
                                        <h6>Paige Turner Posted in UI/UX Community</h6>
                                        <p class="mb-0">30  ago</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('User Notifications Component mounted.')
        }
    }
</script>
