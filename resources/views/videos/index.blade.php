@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h3>Videos</h3>
  @if(auth()->check() && auth()->user()->role === 'admin')
    <a href="{{ route('videos.create') }}" class="btn btn-primary">Add Video</a>
  @endif
</div>

<table class="table mt-3">
  <thead><tr><th>Title</th><th>Action</th></tr></thead>
  <tbody>
    @foreach($videos as $v)
      <tr>
        <td>{{ $v->title }}</td>
        <td>
          <a href="{{ route('videos.show',$v) }}" class="btn btn-sm btn-success">Open</a>
          @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('videos.edit',$v) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('videos.destroy',$v) }}" method="POST" style="display:inline">@csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
