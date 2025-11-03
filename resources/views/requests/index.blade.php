@extends('layouts.app')
@section('content')
<h3>Access Requests</h3>
<table class="table">
  <thead><tr><th>User</th><th>Video</th><th>Status</th><th>Action</th></tr></thead>
  <tbody>
  @foreach($requests as $r)
    <tr>
      <td>{{ $r->user->name ?? 'You' }}</td>
      <td>{{ $r->video->title }}</td>
      <td>{{ $r->status }}</td>
      <td>
        @if(auth()->user()->role === 'admin')
          @if($r->status === 'pending')
            <form action="{{ route('requests.approve',$r) }}" method="POST" style="display:inline">@csrf
              <button class="btn btn-sm btn-success">Approve 2h</button>
            </form>
            <form action="{{ route('requests.revoke',$r) }}" method="POST" style="display:inline">@csrf
              <button class="btn btn-sm btn-danger">Reject</button>
            </form>
          @endif
        @endif
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
