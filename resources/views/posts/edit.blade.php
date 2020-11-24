@extends('layouts.default')
@section('content')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<script src="{{ asset('js/postedit.js') }}"></script>
<script src="{{ asset('js/alertdelay.js') }}"></script>
<script src="{{ asset('js/modeljq.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Edit Post
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
        <form action="{{ route('post.update',$post->id) }}" id="post-form" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title <span>*</span></label>
                <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label>Description <span>*</span></label>
                <textarea class="form-control" id="description" name="description" rows="3">{{$post->description}}</textarea>
            </div>
            <div class="custom-control custom-switch">
                <input type="hidden" name="status" value="0" id="status" />
                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" value="1" />
                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-5">Edit</button>
                <button type="button" id="resetBtnPost" class="btn btn-secondary reset_btn">Clear</button>
            </div>
        </form>
    </div>
</div>
@endsection