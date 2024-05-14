<template>
    
    <div class="row">
        <div class="col-lg-3 col-sm-12" v-for="p in posts">
            <!-- Post widget start -->
            <div class="card p-3">
                <div class="border rounded p-2">
                    <!-- <div class="align-items-center d-flex flex-wrap">
                        <img :src="p.created_by.user_info.profile_image" alt="userimg" class="avatar-40 rounded-circle" loading="lazy" />
                        <div class="d-flex align-items-center">
                            <h6 class="ms-2">{{p.created_by.first_name+' '+p.created_by.last_name}}</h6>
                            <p class="ms-2 mb-0" >@{{p.created_by.username}}</p>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <i class="material-symbols-outlined md-16">
                            schedule
                            </i>
                            <span class="mx-1"><small>{{p.posted_at}}</small></span>
                        </div>
                    </div> -->
                    <div class="align-items-center d-flex flex-wrap">
                        <div class="user-post text-center">
                        <a href="javascript:void(0);">
                            <img src="https://fakeimg.pl/1260x954" alt="post-image" class="img-fluid rounded w-100" loading="lazy">
                            <!-- <img :src="p.post_images[0].image_url" alt="post-image" class="img-fluid rounded w-100 mt-3" loading="lazy"> -->
                        </a>
                        </div>
                    </div>
                   <p class="mb-0">{{p.description}}</p>
                </div>
                <div class="d-flex flex-wrap mb-0 mt-2">
                    <div class="d-flex align-items-start">
                        <a href="javascript:void(0)" @click="setComments(p)" data-bs-toggle="modal" data-bs-target=".commentModal">
                            <i class="material-symbols-outlined md-16">
                            chat_bubble_outline
                            </i>
                        </a>
                        <h6 class="ms-2">{{p.comments_count}}</h6>
                    </div>
                    <hr class="hr-vertical">
                    <div class="d-flex align-items-start">
                        <a href="javascript:void(0)" @click="likeItOrNot(p.id)">
                            <i class="fa fa-heart-o f-18" v-if="p.post_likes.length <= 0" aria-hidden="true"></i>
                            <i class="fa fa-heart f-18 fill-red" v-if="p.post_likes.length > 0" aria-hidden="true"></i>
                        </a>
                        <h6 class="ms-2">{{p.likes_count}}</h6>
                    </div>
                </div>
            </div>
            <!-- Post widget end -->
        </div>

        <!-- Comment Modal Start -->
        <div class="modal fade commentModal" tabindex="-1" role="dialog" aria-labelledby="commentTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentTitle">Comments</h5>
                    <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close">
                    
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <ul class="post-comments list-inline p-0 m-0" v-if="comments.length > 0">
                        <li class="mb-2" v-for="com in comments">
                            <div class="d-flex">
                                <div class="user-img">
                                    <img :src="com.commented_by.user_info.profile_image" alt="userimg" class="avatar-35 rounded-circle img-fluid" loading="lazy">
                                </div>
                                <div class="comment-data-block ms-3">
                                    <h6>{{com.commented_by.first_name+' '+com.commented_by.last_name}}</h6>
                                    <p class="mb-0">{{com.comment}}</p>
                                </div>
                            </div>
                        </li>
                        </ul>
                        <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                        <input type="text" class="form-control rounded" placeholder="Enter Your Comment" v-model="comment.comment">
                        <div class="comment-attagement d-flex">
                            <a href="javascript:void(0);" @click="postComment()" class="material-symbols-outlined  me-3">
                            send
                            </a>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <!-- Comment Modal End -->
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Explore Dashboard Posts Component mounted.')
        },
        created(){
            this.getUserPostsList()
        },
        data() {
            return {
                isLoading: false,
               posts: {},
               comments: [],
               post: {},
               comment: {},
               comment_post_id: null,
               profile_image: null
            }
        },
        methods: {
            getUserPostsList() {
                this.isLoading = true;
                axios.get('/get-user-posts-list')
                .then(response => (
                    this.posts = response.data.posts
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            },
            createPost() {
               if (this.post.description == undefined || this.post.description == '') {
                  this.$swal('Oops!','Please write something','error')
                  return;
               }
               this.errors = {};
               this.isLoading = true;
               axios.post('/user-post', this.post)
               .then(response => (
                     this.getUserPostsList(),
                     this.post = {}
               ))
               .catch(err => (
                  this.errors = err.response.data.errors
               ))
               .finally(() => this.isLoading = false)
            },
            likeItOrNot(post_id){
                this.isLoading = true;
                axios.post('/user-post-like', {post_id})
                .then(response => (
                    this.getUserPostsList()
                ))
                .catch(err => (
                    this.errors = err.response.data.errors
                ))
                .finally(() => this.isLoading = false)
            },
            setComments(post){
               this.comments = post.comments
               this.comment_post_id = post.id
            },
            postComment() {
                if (this.comment.comment == undefined || this.comment.comment == '') {
                    this.$swal('Oops!','Please write something','error')
                    return;
                }
                this.errors = {};
                this.isLoading = true;
                this.comment.post_id = this.comment_post_id;
                axios.post('/user-post-comment', this.comment)
                .then(response => (
                        this.comments = response.data.comments,
                        this.getUserPostsList(),
                        this.comment = {}
                ))
                .catch(err => (
                    this.errors = err.response.data.errors
                ))
                .finally(() => this.isLoading = false)
            }
        }
    }
</script>
