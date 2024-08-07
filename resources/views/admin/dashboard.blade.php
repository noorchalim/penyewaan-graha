<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Admin Dashboard</div>

                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            Welcome, Admin! You are logged in.
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-success text-white">Recent Activities</div>
                                    <div class="card-body">
                                        <ul>
                                            <li>Added new categories.</li>
                                            <li>Updated user permissions.</li>
                                            <li>Reviewed pending requests.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card statistics-card">
                                    <div class="card-header bg-info text-white">Statistics</div>
                                    <div class="card-body">
                                        <p>Total Users: 100</p>
                                        <p>Active Rentals: 25</p>
                                        <p>Revenue this month: $5000</p>
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
