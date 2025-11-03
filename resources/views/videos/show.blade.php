@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-semibold mb-3">{{ $video->title }}</h3>
    <p>{{ $video->description }}</p>

    @if(Auth::user()->role === 'admin')
        <div class="alert alert-info">👑 Admin can view this video directly.</div>
        <div class="ratio ratio-16x9">
            <iframe src="{{ $video->url }}" allowfullscreen></iframe>
        </div>
    @else
        @if($hasAccess)
            <div id="access-section">
                <div class="alert alert-success">
                    ✅ You have access to this video.
                    <br>⏳ Remaining time: <span id="countdown"></span>
                </div>

                <div class="ratio ratio-16x9">
                    <iframe src="{{ $video->url }}" allowfullscreen></iframe>
                </div>
            </div>

            <div id="request-section" class="d-none">
                <div class="alert alert-warning">
                    ⚠️ Your access has expired. Please request again below.
                </div>
                <form method="POST" action="{{ route('requests.store') }}">
                    @csrf
                    <input type="hidden" name="video_id" value="{{ $video->id }}">
                    <button class="btn btn-primary">Request Access Again</button>
                </form>
            </div>

            <script>
                const expiryTime = new Date("{{ $access->expired_at ?? '' }}").getTime();

                const countdownInterval = setInterval(function() {
                    const now = new Date().getTime();
                    const distance = expiryTime - now;

                    if (distance < 0) {
                        clearInterval(countdownInterval);
                        document.getElementById("access-section").classList.add("d-none");
                        document.getElementById("request-section").classList.remove("d-none");
                        return;
                    }

                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    document.getElementById("countdown").innerHTML =
                        `${hours}h ${minutes}m ${seconds}s`;
                }, 1000);
            </script>
        @else
            <div class="alert alert-warning">
                ⚠️ You don’t have access to this video.
            </div>
            <form method="POST" action="{{ route('requests.store') }}">
                @csrf
                <input type="hidden" name="video_id" value="{{ $video->id }}">
                <button class="btn btn-primary">Request Access</button>
            </form>
        @endif
    @endif
</div>
@endsection
