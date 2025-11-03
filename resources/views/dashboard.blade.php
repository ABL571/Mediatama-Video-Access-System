@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4 fw-semibold">📊 Dashboard Overview</h3>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4 bg-primary text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Videos</h5>
                    <h2 class="fw-bold">{{ $videos }}</h2>
                    <p class="mb-0">Uploaded by admin</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4 bg-success text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Customers</h5>
                    <h2 class="fw-bold">{{ $customers }}</h2>
                    <p class="mb-0">Registered users</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4 bg-warning text-dark">
                <div class="card-body text-center">
                    <h5 class="card-title">Pending Requests</h5>
                    <h2 class="fw-bold">{{ $pending }}</h2>
                    <p class="mb-0">Awaiting approval</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4 bg-info text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Approved Access</h5>
                    <h2 class="fw-bold">{{ $approved }}</h2>
                    <p class="mb-0">Active video access</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="fw-semibold mb-3">Quick Links</h5>
            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ route('videos.index') }}" class="btn btn-primary">
                    🎥 Manage Videos
                </a>
                <a href="{{ route('requests.index') }}" class="btn btn-warning">
                    📩 Manage Requests
                </a>
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('users.index') }}" class="btn btn-success">
                    👥 Manage Customers
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
