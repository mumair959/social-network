<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/get-cities-list', [App\Http\Controllers\CityController::class, 'getAllCitiesList'])->name('get-cities-list');
Route::get('/get-countries-list', [App\Http\Controllers\CountryController::class, 'getAllCountriesList'])->name('get-countries-list');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/explore', [App\Http\Controllers\ExploreController::class, 'index'])->name('explore');
Route::get('/get-user-dashboard-data', [App\Http\Controllers\ExploreController::class, 'getUserDashboardData'])->name('get_user_dashboard_data');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/edit-profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit_profile');
Route::get('/get-user-profile-data', [App\Http\Controllers\ProfileController::class, 'getUserProfileData'])->name('get_user_profile_data');
Route::get('/get-user-profile-image', [App\Http\Controllers\ProfileController::class, 'getUserProfileImage'])->name('get_user_profile_image');
Route::get('/get-user-info', [App\Http\Controllers\ProfileController::class, 'getUserInfo'])->name('get_user_info');
Route::get('/get-user-profile-summary', [App\Http\Controllers\ProfileController::class, 'getUserProfileSummary'])->name('get_user_profile_summary');
Route::get('/get-user-friend-requests', [App\Http\Controllers\ProfileController::class, 'getUserFriendRequests'])->name('get_user_friend_requests');
Route::post('/update-user-info', [App\Http\Controllers\ProfileController::class, 'updateUserInfo'])->name('update_user_info');
Route::post('/update-user-password', [App\Http\Controllers\ProfileController::class, 'updateUserPassword'])->name('update_user_password');
Route::post('/update-user-social-urls', [App\Http\Controllers\ProfileController::class, 'updateUserSocialUrls'])->name('update_user_social_urls');
Route::post('/update-user-contact', [App\Http\Controllers\ProfileController::class, 'updateUserContact'])->name('update_user_contact');

Route::get('/friends', [App\Http\Controllers\FriendController::class, 'index'])->name('friends');
Route::get('/friends-list', [App\Http\Controllers\FriendController::class, 'friendsList'])->name('friends_list');
Route::get('/friend-requests', [App\Http\Controllers\FriendController::class, 'friendRequests'])->name('friend_requests');
Route::get('/get-top-friends-list', [App\Http\Controllers\FriendController::class, 'getTopFriendsList'])->name('get_top_friends_list');

Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');

Route::get('/faqs', [App\Http\Controllers\FaqController::class, 'index'])->name('faqs');
Route::get('/get-all-faqs-list', [App\Http\Controllers\FaqController::class, 'getAllFaqsList'])->name('get-all-faqs-list');

Route::get('/get-top-tags-list', [App\Http\Controllers\TagController::class, 'getTopTags'])->name('get_top_tags');

Route::get('/get-followings-recommendations', [App\Http\Controllers\FollowingController::class, 'getFollowingsRecommendations'])->name('get_followings_recommendations');
Route::post('/follow-user', [App\Http\Controllers\FollowingController::class, 'followUser'])->name('follow_user');
Route::post('/unfollow-user', [App\Http\Controllers\FollowingController::class, 'unfollowUser'])->name('unfollow_user');

Route::get('/get-user-posts-list', [App\Http\Controllers\PostController::class, 'getUserPostList'])->name('get_user_posts_list');
Route::post('/user-post', [App\Http\Controllers\PostController::class, 'userPost'])->name('user_post');
Route::post('/user-post-comment', [App\Http\Controllers\PostController::class, 'userPostComment'])->name('user_post_comment');
Route::post('/user-post-like', [App\Http\Controllers\PostController::class, 'userPostLike'])->name('user_post_like');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin_dashboard');
    Route::get('/get-dashboard-data', [App\Http\Controllers\Admin\DashboardController::class, 'getDashboardData'])->name('admin_get_dashboard_board');
    Route::get('/get-user-gender-chart-data', [App\Http\Controllers\Admin\DashboardController::class, 'getUserGenderData'])->name('admin_get_user_gender_chart_data');
    Route::get('/get-user-account-chart-data', [App\Http\Controllers\Admin\DashboardController::class, 'getUserAccountData'])->name('admin_get_user_account_chart_data');

    Route::get('/users-list', [App\Http\Controllers\UserController::class, 'index'])->name('admin_users_list');
    Route::get('/get-all-users', [App\Http\Controllers\UserController::class, 'getAllUsers'])->name('admin_get_all_users');
    Route::post('/update-user-status', [App\Http\Controllers\UserController::class, 'updateStatus'])->name('admin_update_user_status');

    Route::get('/groups-list', [App\Http\Controllers\GroupController::class, 'index'])->name('admin_groups_list');
    Route::get('/get-all-groups', [App\Http\Controllers\GroupController::class, 'getAllGroups'])->name('admin_get_all_groups');
    Route::post('/update-group-status', [App\Http\Controllers\GroupController::class, 'updateStatus'])->name('admin_update_group_status');

    Route::get('/pages-list', [App\Http\Controllers\PageController::class, 'index'])->name('admin_pages_list');
    Route::get('/get-all-pages', [App\Http\Controllers\PageController::class, 'getAllPages'])->name('admin_get_all_pages');
    Route::post('/update-page-status', [App\Http\Controllers\PageController::class, 'updateStatus'])->name('admin_update_page_status');

    Route::get('/tags-list', [App\Http\Controllers\TagController::class, 'index'])->name('admin_tags_list');
    Route::get('/get-all-tags', [App\Http\Controllers\TagController::class, 'getAllTags'])->name('admin_get_all_tags');
    Route::post('/update-tag-status', [App\Http\Controllers\TagController::class, 'updateStatus'])->name('admin_update_tag_status');
    Route::get('/get-tag/{id}', [App\Http\Controllers\TagController::class, 'get'])->name('admin_get_tag');
    Route::post('/create-tag', [App\Http\Controllers\TagController::class, 'create'])->name('admin_create_tag');
    Route::post('/update-tag', [App\Http\Controllers\TagController::class, 'update'])->name('admin_update_tag');
    Route::post('/delete-tag', [App\Http\Controllers\TagController::class, 'delete'])->name('admin_delete_tag');

    Route::get('/posts-list', [App\Http\Controllers\PostController::class, 'index'])->name('admin_posts_list');
    Route::get('/get-all-posts', [App\Http\Controllers\PostController::class, 'getAllPosts'])->name('admin_get_all_posts');

    Route::get('/comments-list', [App\Http\Controllers\CommentController::class, 'index'])->name('admin_comments_list');
    Route::get('/get-all-comments', [App\Http\Controllers\CommentController::class, 'getAllComments'])->name('admin_get_all_comments');

    Route::get('/problem-reported-list', [App\Http\Controllers\ProblemReportedController::class, 'index'])->name('admin_problem_reported_list');
    Route::get('/get-all-comments-disputes', [App\Http\Controllers\ProblemReportedController::class, 'getAllCommentsDisputes'])->name('admin_get_all_comments_disputes');
    Route::get('/get-all-users-disputes', [App\Http\Controllers\ProblemReportedController::class, 'getAllUsersDisputes'])->name('admin_get_all_users_disputes');
    Route::get('/get-all-posts-disputes', [App\Http\Controllers\ProblemReportedController::class, 'getAllPostsDisputes'])->name('admin_get_all_posts_disputes');

    Route::get('/faqs-list', [App\Http\Controllers\FaqController::class, 'list'])->name('admin_faqs_list');
    Route::get('/get-all-faqs', [App\Http\Controllers\FaqController::class, 'getAll'])->name('admin_get_all_faqs');
    Route::get('/get-faq/{id}', [App\Http\Controllers\FaqController::class, 'get'])->name('admin_get_faq');
    Route::post('/create-faq', [App\Http\Controllers\FaqController::class, 'create'])->name('admin_create_faq');
    Route::post('/update-faq', [App\Http\Controllers\FaqController::class, 'update'])->name('admin_update_faq');
    Route::post('/delete-faq', [App\Http\Controllers\FaqController::class, 'delete'])->name('admin_delete_faq');


});