@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        
        <dashboard-widget-component></dashboard-widget-component>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header">
                        <div class=" d-flex justify-content-between flex-wrap">
                            <h4 class="card-title">New Accounts</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <admin-dashboard-user-account-bar-chart-component></admin-dashboard-user-account-bar-chart-component>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">User Gender</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <admin-dashboard-user-gender-pie-chart-component></admin-dashboard-user-gender-pie-chart-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
