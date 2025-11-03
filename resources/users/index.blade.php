@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h3>Customers</h3>
  <a href="{{ route('users.create') }}" class="btn btn-primary">Add Customer</a>
</div>

<table class="table mt-3">
  <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Action</th></tr></thead>
  <tbody>
    @foreach($users as $u)
    <tr>
      <td>{{ $u->id }}</td>
      <td>{{ $u->name }}</td>
      <td>{{ $u->email }}</td>
      <td>
        <a href="{{ route('users.edit',$u) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('users.destroy',$u) }}" method="POST" style="display:inline">@csrf @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this customer?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $users->links() }}
@endsection
