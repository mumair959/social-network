<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Friend Request</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center" v-if="true">
                        <p class="mb-0">
                            <i class="icon material-symbols-outlined font-50">
                                search
                            </i>
                        </p>
                        <h5 class="mb-0">No Friend Requests Found</h5>
                    </div>
                    <ul class="request-list list-inline m-0 p-0" v-if="false">
                        <li class="d-flex align-items-center  justify-content-between flex-wrap">
                            <div class="user-img img-fluid flex-shrink-0">
                                <img src="/assets/images/user/05.jpg" alt="story-img" class="rounded-circle avatar-40" loading="lazy">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6>Jaques Amole</h6>
                                <p class="mb-0">40  friends</p>
                            </div>
                            <div class="d-flex align-items-center mt-2 mt-md-0">
                                <div class="confirm-click-btn">
                                    <a href="#" class="me-3 btn btn-primary rounded confirm-btn">Confirm</a>
                                    <a href="https://templates.iqonic.design/socialv/bs5/html/dist/app/profile.html" class="me-3 btn btn-primary rounded request-btn" style="display: none;">View All</a>
                                </div>
                                <a href="#" class="btn btn-secondary rounded" data-extra-toggle="delete" data-closest-elem=".item">Delete Request</a>                                    
                            </div>
                        </li>
                        <li class="d-block text-center mb-0 pb-0">
                            <a href="#" class="me-3 btn btn-primary">View More Request</a>
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
            console.log('User Friend Requests Component mounted.')
        }
    }
</script>
