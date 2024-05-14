@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
    <div class="row">
            <div class="col-lg-3">
               
               <profile-widget-component></profile-widget-component>

               <followings-list-component></followings-list-component>

            </div>

            <user-posts-section-component></user-posts-section-component>

            <div class="col-lg-3">
               <trends-list-component></trends-list-component>
            </div>
        </div>
    </div>
</div>
@endsection
