@extends('layouts.app')
@section('content')
<h3>Add Video</h3>
<form method="POST" action="{{ route('videos.store') }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input class="form-control" name="title" required>
  </div>
  <div class="mb-3">
    <label class="form-label">URL (use embed link or full youtube link)</label>
    <input class="form-control" name="url" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" name="description"></textarea>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
