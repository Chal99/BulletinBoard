@extends('layouts.default')
@section('content')
<script src="{{ asset('js/alertdelay.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Confirm Post
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Title </label>
                <input type="text" name="title" class="form-control" value="{{ $title }}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3">{{ $description }}</textarea>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-5">Confirm</button>
                <a class="btn btn-secondary" href="{{route('post.create')}}">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection