/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

app.use(VueSweetalert2);

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

// GENERAL COMPONENTS
import FriendsListComponent from './components/General/FriendsListComponent.vue';
app.component('friends-list-component', FriendsListComponent);

import FaqsListComponent from './components/General/FaqsListComponent.vue';
app.component('faqs-list-component', FaqsListComponent);

import FollowingsListComponent from './components/General/FollowingsListComponent.vue';
app.component('followings-list-component', FollowingsListComponent);

import TrendsListComponent from './components/General/TrendsListComponent.vue';
app.component('trends-list-component', TrendsListComponent);

import UserPostsSectionComponent from './components/General/UserPostsSectionComponent.vue';
app.component('user-posts-section-component', UserPostsSectionComponent);

// PROFILE COMPONENTS
import ProfileHeaderComponent from './components/Profile/ProfileHeaderComponent.vue';
app.component('profile-header-component', ProfileHeaderComponent);

import ProfileSidebarComponent from './components/Profile/ProfileSidebarComponent.vue';
app.component('profile-sidebar-component', ProfileSidebarComponent);

import ProfilePostsSectionComponent from './components/Profile/ProfilePostsSectionComponent.vue';
app.component('profile-posts-section-component', ProfilePostsSectionComponent);

import EditProfileComponent from './components/Profile/EditProfileComponent.vue';
app.component('edit-profile-component', EditProfileComponent);

import ProfileWidgetComponent from './components/Profile/ProfileWidgetComponent.vue';
app.component('profile-widget-component', ProfileWidgetComponent);

// FRIENDS COMPONENTS
import UserFriendsListComponent from './components/Friend/UserFriendsListComponent.vue';
app.component('user-friends-list-component', UserFriendsListComponent);

import UserFriendRequestsComponent from './components/Friend/UserFriendRequestsComponent.vue';
app.component('user-friend-requests-component', UserFriendRequestsComponent);

// NOTIFICATIONS COMPONENTS
import UserNotificationsListComponent from './components/Notification/UserNotificationsListComponent.vue';
app.component('user-notifications-list-component', UserNotificationsListComponent);

//USERS COMPONENTS
import ExploreDashboardWidgetComponent from './components/User/ExploreDashboardWidgetComponent.vue';
app.component('explore-dashboard-widget-component', ExploreDashboardWidgetComponent);

import ExploreDashboardPostComponent from './components/User/ExploreDashboardPostComponent.vue';
app.component('explore-dashboard-post-component', ExploreDashboardPostComponent);

/**
 * ***********************************
 * *********ADMIN COMPONENTS**********
 * ***********************************
 */

// DISPUTES COMPONENTS
import DisputesComponent from './components/Admin/Disputes/DisputesComponent.vue';
app.component('disputes-component', DisputesComponent);

import CommentDisputesComponent from './components/Admin/Disputes/CommentDisputesComponent.vue';
app.component('comment-disputes-component', CommentDisputesComponent);

import PostDisputesComponent from './components/Admin/Disputes/PostDisputesComponent.vue';
app.component('post-disputes-component', PostDisputesComponent);

import UserDisputesComponent from './components/Admin/Disputes/UserDisputesComponent.vue';
app.component('user-disputes-component', UserDisputesComponent);

// FAQs COMPONENTS
import FaqsListingComponent from './components/Admin/Faq/FaqsListingComponent.vue';
app.component('faq-listing-component', FaqsListingComponent);

//MANAGEMENT COMPONENTS
import UsersListingComponent from './components/Admin/User/UsersListingComponent.vue';
app.component('users-listing-component', UsersListingComponent);

import PagesListingComponent from './components/Admin/Page/PagesListingComponent.vue';
app.component('pages-listing-component', PagesListingComponent);

import TagsListingComponent from './components/Admin/Tag/TagsListingComponent.vue';
app.component('tags-listing-component', TagsListingComponent);

import GroupsListingComponent from './components/Admin/Group/GroupsListingComponent.vue';
app.component('groups-listing-component', GroupsListingComponent);

import PostsListingComponent from './components/Admin/Post/PostsListingComponent.vue';
app.component('posts-listing-component', PostsListingComponent);

import CommentsListingComponent from './components/Admin/Comment/CommentsListingComponent.vue';
app.component('comments-listing-component', CommentsListingComponent);

// DASHBOARD COMPONENTS
import DashboardWidgetComponent from './components/Admin/Dashboard/DashboardWidgetComponent.vue';
app.component('dashboard-widget-component', DashboardWidgetComponent);

// CHART COMPONENTS
import AdminDashboardUserAccountBarChart from './components/charts/AdminDashboardUserAccountBarChart.vue';
app.component('admin-dashboard-user-account-bar-chart-component', AdminDashboardUserAccountBarChart);

import AdminDashboardUserGenderPieChart from './components/charts/AdminDashboardUserGenderPieChart.vue';
app.component('admin-dashboard-user-gender-pie-chart-component', AdminDashboardUserGenderPieChart);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
