<template>
    <ul class="list-unstyled row mb-0">
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-success">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-success">Posts</span>
                        <i class="icon material-symbols-outlined font-50 icon-success pull-right">
                            mail
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.posts }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-danger">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-danger">All Users</span>
                        <i class="icon material-symbols-outlined font-50 icon-danger pull-right">
                            people
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.all_users }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-success">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-success">Active Users</span>
                        <i class="icon material-symbols-outlined font-50 icon-success pull-right">
                            people
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.active_users }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-primary">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-primary">Blocked Users</span>
                        <i class="icon material-symbols-outlined font-50 icon-primary pull-right">
                            people
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.blocked_users }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-warning">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-warning">Comments</span>
                        <i class="icon material-symbols-outlined font-50 icon-warning pull-right">
                            chat
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.comments }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-success">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-success">Likes</span>
                        <i class="icon material-symbols-outlined font-50 icon-success pull-right">
                            chat
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.likes }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-danger">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-danger">Photos</span>
                        <i class="icon material-symbols-outlined font-50 icon-danger pull-right">
                            chat
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.photos }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-warning">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-warning">Videos</span>
                        <i class="icon material-symbols-outlined font-50 icon-warning pull-right">
                            chat
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.videos }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-danger">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-danger">Total Hashtags</span>
                        <i class="icon material-symbols-outlined font-50 icon-danger pull-right">
                            chat
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.total_hashtags }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-success">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-success">Today Viral Hashtag</span>
                        <i class="icon material-symbols-outlined font-50 icon-success pull-right">
                            tag
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.today_viral }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-danger">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-danger">This Week Viral</span>
                        <i class="icon material-symbols-outlined font-50 icon-danger pull-right">
                            trending_up
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.this_week_viral }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-lg-2 col-md-3">
            <div class="card bg-soft-primary">
                <div class="card-body">
                    <div class="points">
                        <span class="icon-primary">All Time Viral</span>
                        <i class="icon material-symbols-outlined font-50 icon-primary pull-right">
                            trophy
                        </i>
                        <div class="d-flex align-items-center">
                            <h3>{{ dashboard.all_time_viral }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        mounted() {
            console.log('Dashboard Widget Component mounted.')
        },
        created(){
            this.getDashboardData()
        },
        data() {
            return {
                isLoading: false,
                dashboard: {users : 0, posts : 0, comments : 0, likes : 0}
            }
        },
        methods: {
            getDashboardData() {
                this.isLoading = true;
                axios.get('/admin/get-dashboard-data')
                .then(response => (
                    this.dashboard = response.data
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
