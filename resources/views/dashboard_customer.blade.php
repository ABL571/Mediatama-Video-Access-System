@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4 fw-semibold">📊 Welcome, {{ Auth::user()->name }}</h3>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-primary text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Available Videos</h5>
                    <h2 class="fw-bold">{{ $videos }}</h2>
                    <p class="mb-0">Total videos you can request</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-warning text-dark">
                <div class="card-body text-center">
                    <h5 class="card-title">Requests Sent</h5>
                    <h2 class="fw-bold">{{ $requests }}</h2>
                    <p class="mb-0">Pending or approved requests</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-success text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Active Access</h5>
                    <h2 class="fw-bold">{{ $approved }}</h2>
                    <p class="mb-0">Currently watchable videos</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="card shadow-sm border-0">
        <div class="card-body text-center">
            <h5 class="fw-semibold mb-2">Want to watch something?</h5>
            <a href="{{ route('videos.index') }}" class="btn btn-primary">
                🎥 Browse Videos
            </a>
        </div>
    </div>
</div>
@endsection
