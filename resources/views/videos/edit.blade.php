@extends('layouts.app')
@section('content')
<h3>Edit Video</h3>
<form method="POST" action="{{ route('videos.update',$video) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input class="form-control" name="title" value="{{ $video->title }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">URL</label>
    <input class="form-control" name="url" value="{{ $video->url }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" name="description">{{ $video->description }}</textarea>
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection
