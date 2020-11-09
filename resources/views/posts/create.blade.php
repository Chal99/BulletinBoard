@extends('layouts.default')
@section('content')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">

<div class="card m-5">
    <div class="card-header">
        Create Post
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label>Title <span>*</span></label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Descripption <span>*</span></label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group d-flex justify-content-end">
                <a type="button" class="btn btn-primary mr-5" href="{{route('confirm-post')}}">Create</a>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</div>
@endsection