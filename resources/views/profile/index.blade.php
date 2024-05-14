@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <profile-header-component></profile-header-component>

        <div class="row mt-1">
            <profile-sidebar-component></profile-sidebar-component>
            
            <profile-posts-section-component></profile-posts-section-component>
        </div>
    </div>
</div>
@endsection
