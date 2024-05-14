<template>
    <div class="col-sm-12 col-md-8 offset-md-2 ">
        <div class="card">
           <div class="card-header d-flex justify-content-between">
              <div class="header-title">
                 <h4 class="card-title">Disputes</h4>
              </div>
           </div>
           <div class="card-body">
              <ul class="nav nav-tabs" id="myTab-1" role="tablist">
                 <li class="nav-item">
                    <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">Users Disputes</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" id="comment-tab" data-bs-toggle="tab" href="#comment-one" role="tab" aria-controls="comment" aria-selected="false">Comments Disputes</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" id="post-tab" data-bs-toggle="tab" href="#post" role="tab" aria-controls="post" aria-selected="false">Posts Disputes</a>
                 </li>
              </ul>
              <div class="tab-content" id="myTabContent-2">
                 <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                    <user-disputes-component></user-disputes-component>
                 </div>
                 <div class="tab-pane fade" id="comment-one" role="tabpanel" aria-labelledby="comment-tab">
                    <comment-disputes-component></comment-disputes-component>
                 </div>
                 <div class="tab-pane fade" id="post" role="tabpanel" aria-labelledby="post-tab">
                    <post-disputes-component></post-disputes-component>
                 </div>
              </div>
           </div>
        </div>
    </div>
</template>

<script>
    import UserDisputesComponent from './UserDisputesComponent.vue';
    import PostDisputesComponent from './PostDisputesComponent.vue';
    import CommentDisputesComponent from './CommentDisputesComponent.vue';

    export default {
        mounted() {
            console.log('Disputes Component mounted.')
        }
    }
</script>