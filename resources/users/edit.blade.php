@extends('layouts.app')
@section('content')
<h3>Edit Customer</h3>
<form method="POST" action="{{ route('users.update',$user) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input class="form-control" name="name" value="{{ old('name',$user->name) }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input class="form-control" name="email" value="{{ old('email',$user->email) }}" required>
  </div>
  <div class="mb-3 row">
    <div class="col">
      <label class="form-label">Password (leave blank to keep)</label>
      <input class="form-control" name="password" type="password">
    </div>
    <div class="col">
      <label class="form-label">Confirm Password</label>
      <input class="form-control" name="password_confirmation" type="password">
    </div>
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection
