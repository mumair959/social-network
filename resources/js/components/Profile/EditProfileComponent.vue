<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                <div class="iq-edit-list">
                    <ul class="iq-edit-profile row nav nav-pills">
                        <li class="col-md-3 p-0">
                            <a class="nav-link active" data-bs-toggle="pill" href="#personal-information">
                            Personal Information
                            </a>
                        </li>
                        <li class="col-md-3 p-0">
                            <a class="nav-link" data-bs-toggle="pill" href="#chang-pwd">
                            Change Password
                            </a>
                        </li>
                        <li class="col-md-3 p-0">
                            <a class="nav-link" data-bs-toggle="pill" href="#emailandsms">
                            Manage Social Media
                            </a>
                        </li>
                        <li class="col-md-3 p-0">
                            <a class="nav-link" data-bs-toggle="pill" href="#manage-contact">
                            Manage Contact
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="iq-edit-list-data">
                <div class="tab-content">
                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                            <h4 class="card-title">Personal Information</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="editUserProfile">
                                <div class="form-group row align-items-center">
                                    <div class="col-md-12">
                                        <div class="profile-img profile-img-edit">
                                            <img class="avatar-145" :src="user_info.profile_image" alt="profile-pic" loading="lazy">
                                            <div class="p-image d-flex align-items-center justify-content-center">
                                                <label for="profile-img">
                                                    <span class="material-symbols-outlined mt-10">edit</span>
                                                    <input class="file-upload" type="file" id="profile-img" accept="image/*" @change="handleProfileImgUpload"/>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row align-items-center">
                                    <div class="form-group col-sm-6">
                                        <label for="fname"  class="form-label">First Name:</label>
                                        <input type="text" class="form-control" v-model="user_info.first_name" placeholder="Enter First Name">
                                        <span class="error-text-class">{{(errors.first_name == undefined) ? '' : errors.first_name[0]}}</span>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="lname" class="form-label">Last Name:</label>
                                        <input type="text" class="form-control" v-model="user_info.last_name" placeholder="Enter Last Name">
                                        <span class="error-text-class">{{(errors.last_name == undefined) ? '' : errors.last_name[0]}}</span>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="uname" class="form-label">User Name:</label>
                                        <input type="text" class="form-control" v-model="user_info.username" placeholder="Enter Username">
                                        <span class="error-text-class">{{(errors.username == undefined) ? '' : errors.username[0]}}</span>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="uname" class="form-label">Introduction:</label>
                                        <input type="text" class="form-control" v-model="user_info.introduction" placeholder="Enter Short Intro About Yourself">
                                        <span class="error-text-class">{{(errors.introduction == undefined) ? '' : errors.introduction[0]}}</span>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label d-block">Gender:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" v-model="user_info.gender">
                                            <label class="form-check-label" for="male"> Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" v-model="user_info.gender">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <span class="error-text-class">{{(errors.gender == undefined) ? '' : errors.gender[0]}}</span>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="dob" class="form-label">Date Of Birth:</label>
                                        <input type="date" class="form-control" v-model="user_info.date_of_birth">
                                        <span class="error-text-class">{{(errors.date_of_birth == undefined) ? '' : errors.date_of_birth[0]}}</span>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Country:</label>
                                        <select class="form-select" aria-label="Default select example 3" v-model="user_info.country_id">
                                            <option disabled selected>Select Country</option>
                                            <option v-for="con in countries" :value="con.id">{{con.name}}</option>
                                        </select>
                                        <span class="error-text-class">{{(errors.country_id == undefined) ? '' : errors.country_id[0]}}</span>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">City:</label>
                                        <select class="form-select" aria-label="Default select example 4" v-model="user_info.city_id">
                                            <option disabled selected>Select City</option>
                                            <option v-for="cit in cities" :value="cit.id">{{cit.name}}</option>
                                        </select>
                                        <span class="error-text-class">{{(errors.city_id == undefined) ? '' : errors.city_id[0]}}</span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button type="reset" class="btn bg-soft-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                            <h4 class="card-title">Change Password</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="editUserPassword">
                                <div class="form-group">
                                    <label for="cpass" class="form-label">Current Password:</label>
                                    <input type="Password" class="form-control" v-model="user_info.current_password" placeholder="Enter Current Password">
                                    <span class="error-text-class">{{(errors.current_password == undefined) ? '' : errors.current_password[0]}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="npass" class="form-label">New Password:</label>
                                    <input type="Password" class="form-control" v-model="user_info.password" placeholder="Enter New Password">
                                    <span class="error-text-class">{{(errors.password == undefined) ? '' : errors.password[0]}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="vpass" class="form-label">Verify Password:</label>
                                    <input type="Password" class="form-control" v-model="user_info.password_confirmation" placeholder="Confirm New Password">
                                    <span class="error-text-class">{{(errors.password_confirmation == undefined) ? '' : errors.password_confirmation[0]}}</span>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button type="reset" class="btn bg-soft-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                            <h4 class="card-title">Manage Social Media</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="editUserSocialUrls">
                                <div class="form-group">
                                    <label for="cno"  class="form-label">Facebook:</label>
                                    <input type="text" class="form-control" v-model="user_info.facebook" placeholder="Enter Facebook URL">
                                    <span class="error-text-class">{{(errors.facebook == undefined) ? '' : errors.facebook[0]}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="cno"  class="form-label">Twitter:</label>
                                    <input type="text" class="form-control" v-model="user_info.twitter" placeholder="Enter Twitter URL">
                                    <span class="error-text-class">{{(errors.twitter == undefined) ? '' : errors.twitter[0]}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="cno"  class="form-label">Linkedin:</label>
                                    <input type="text" class="form-control" v-model="user_info.linkedin" placeholder="Enter Linkedin URL">
                                    <span class="error-text-class">{{(errors.linkedin == undefined) ? '' : errors.linkedin[0]}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="cno"  class="form-label">Instagram:</label>
                                    <input type="text" class="form-control" v-model="user_info.instagram" placeholder="Enter Instagram URL">
                                    <span class="error-text-class">{{(errors.instagram == undefined) ? '' : errors.instagram[0]}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="cno"  class="form-label">Youtube:</label>
                                    <input type="text" class="form-control" v-model="user_info.youtube" placeholder="Enter Youtube URL">
                                    <span class="error-text-class">{{(errors.youtube == undefined) ? '' : errors.youtube[0]}}</span>
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button type="reset" class="btn bg-soft-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                            <h4 class="card-title">Manage Contact</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="editUserContact">
                                <div class="form-group">
                                    <label for="cno"  class="form-label">Contact Number:</label>
                                    <input type="text" class="form-control" v-model="user_info.contact_no" placeholder="Enter Contact#">
                                    <span class="error-text-class">{{(errors.contact_no == undefined) ? '' : errors.contact_no[0]}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="email"  class="form-label">Email:</label>
                                    <input type="text" class="form-control" id="email" :disabled="true" v-model="user_info.email" placeholder="Enter Email Address">
                                    <span class="error-text-class">{{(errors.email == undefined) ? '' : errors.email[0]}}</span>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button type="reset" class="btn bg-soft-danger">Cancel</button>
                            </form>
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
            console.log('Edit Profile Component mounted.')
        },
        created(){
            this.getCitiesData(),
            this.getCountriesData(),
            this.getUserInfoData()
        },
        data() {
            return {
                isLoading: false,
                user_info: {},
                user_password: {},
                user_social: {},
                user_contact: {},
                errors: {},
                countries: {},
                cities: {}
            }
        },
        methods: {
            getCitiesData() {
                this.isLoading = true;
                axios.get('/get-cities-list')
                .then(response => (
                    this.cities = response.data.cities
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            },
            getCountriesData() {
                this.isLoading = true;
                axios.get('/get-countries-list')
                .then(response => (
                    this.countries = response.data.countries
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            },
            getUserInfoData() {
                this.isLoading = true;
                axios.get('/get-user-info')
                .then(response => (
                    this.user_info = response.data.user_info
                ))
                .catch(err => (
                    console.log(err)
                ))
                .finally(() => this.isLoading = false)
            },
            editUserProfile(){
                this.isLoading = true;
                this.errors = {};
                axios.post('/update-user-info',this.user_info)
                    .then(response => (
                        this.$swal('Great!',response.data.msg,'success')
                    ))
                    .catch(err => (
                        this.errors = err.response.data.errors
                    ))
                    .finally(() => this.isLoading = false)
            },
            editUserPassword(){
                this.isLoading = true;
                this.errors = {};
                axios.post('/update-user-password',this.user_info)
                    .then(response => (
                        this.$swal(response.data.title,response.data.msg,response.data.type)
                    ))
                    .catch(err => (
                        this.errors = err.response.data.errors
                    ))
                    .finally(() => this.isLoading = false)
            },
            editUserSocialUrls(){
                this.isLoading = true;
                this.errors = {};
                axios.post('/update-user-social-urls',this.user_info)
                    .then(response => (
                        this.$swal('Great!',response.data.msg,'success')
                    ))
                    .catch(err => (
                        this.errors = err.response.data.errors
                    ))
                    .finally(() => this.isLoading = false)
            },
            editUserContact(){
                this.isLoading = true;
                this.errors = {};
                axios.post('/update-user-contact',this.user_info)
                    .then(response => (
                        this.$swal('Great!',response.data.msg,'success')
                    ))
                    .catch(err => (
                        this.errors = err.response.data.errors
                    ))
                    .finally(() => this.isLoading = false)
            },
            handleProfileImgUpload(event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = () => {
                    this.user_info.profile_image = reader.result;
                };

                reader.readAsDataURL(file);
            },

        }
    }
</script>
