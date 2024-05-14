<template>
    <div class="right-sidebar-panel p-0">
        <div class="card shadow-none">
        <div class="card-body p-0">
            <div class="media-height p-3" data-scrollbar="init">
                <h4>You are following</h4>
                <hr />
                <div v-for="friend in friends" class="d-flex align-items-center mb-4">
                    <div>
                        <img class="rounded-circle avatar-50" src="/assets/images/user/04.jpg" alt="" loading="lazy">
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{friend.first_name+' '+friend.last_name}}</h6>
                        <button class="btn btn-sm btn-danger pad-1">Send Request</button>
                    </div>
                </div>

                <div class="text-center" v-if="friends.length <= 0">
                    <p class="mb-0">
                        <i class="icon material-symbols-outlined font-50">
                            search
                        </i>
                    </p>
                    <h6 class="mb-0">No Followings Found</h6>
                </div>
            </div>
            <div class="right-sidebar-toggle bg-primary text-white mt-3 d-flex">
                <span class="material-symbols-outlined">chat</span>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Friends List Component mounted.')
        },
        created(){
            this.getFriendsListData()
        },
        data() {
            return {
                isLoading: false,
                friends: {}
            }
        },
        methods: {
          getFriendsListData() {
            this.isLoading = true;
            axios.get('/get-top-friends-list')
              .then(response => (
                  this.friends = response.data.friends
              ))
              .catch(err => (
                  console.log(err)
              ))
              .finally(() => this.isLoading = false)
          }
        }
    }
</script>
