@extends('layouts.admin')

@section('title')
    Komodata - Admin Dashboard
@endsection

@section('content')
    <div id="page-content-wrapper">
        <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
        >
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard</h2>
            <p class="dashboard-subtitle">
                This is Komodata Admin Page
            </p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-body">
                        <div class="dashboard-card-title">
                            Surveyors
                        </div>
                        <div class="dashboard-card-subtitle">
                            {{ $surveyors }}
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-body">
                        <div class="dashboard-card-title">
                            Approved Commodities
                        </div>
                        <div class="dashboard-card-subtitle">
                            {{ $commodities }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    
@endsection