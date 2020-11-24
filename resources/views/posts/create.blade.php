@extends('layouts.default')
@section('content')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<script src="{{ asset('js/alertdelay.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Create Post
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
        <form action="{{ url('/post/confirmation') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Title <span>*</span></label>
                <input type="text" name="title" class="form-control" value="{{ $title }}">
            </div>
            <div class="form-group">
                <label>Description <span>*</span></label>
                <textarea class="form-control" name="description" rows="3">{{ $description }}</textarea>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-5">Create</a>
                    <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</div>
@endsection