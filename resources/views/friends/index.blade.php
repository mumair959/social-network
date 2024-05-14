@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
    <div class="header-for-bg mb-5">
        <div class="background-header position-relative">
            <img src="../assets/images/page-img/profile-bg3.jpg" class="img-fluid w-100" alt="header-bg" loading="lazy">
            <div class="title-on-header">
                <div class="data-block">
                    <h2>Friend Lists</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <user-friends-list-component></user-friends-list-component>
    </div>
</div>
@endsection
