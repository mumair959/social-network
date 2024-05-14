@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <explore-dashboard-widget-component></explore-dashboard-widget-component>

        <explore-dashboard-post-component></explore-dashboard-post-component>
    </div>
</div>
@endsection
