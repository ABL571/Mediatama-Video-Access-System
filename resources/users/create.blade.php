@extends('layouts.app')
@section('content')
<h3>Add Customer</h3>
<form method="POST" action="{{ route('users.store') }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input class="form-control" name="name" value="{{ old('name') }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input class="form-control" name="email" value="{{ old('email') }}" required>
  </div>
  <div class="mb-3 row">
    <div class="col">
      <label class="form-label">Password</label>
      <input class="form-control" name="password" type="password" required>
    </div>
    <div class="col">
      <label class="form-label">Confirm Password</label>
      <input class="form-control" name="password_confirmation" type="password" required>
    </div>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
