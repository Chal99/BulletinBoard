@extends('layouts.default')
@section('content')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('bootstrap-switch-master\dist\css\bootstrap4\bootstrap-switch.css') }}" rel="stylesheet">
<script src="{{ asset('bootstrap-switch-master\dist\js\bootstrap-switch.js') }}"></script> -->
<script src="{{ asset('js/postedit.js') }}"></script>
<script src="{{ asset('js/alertdelay.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Edit Post
    </div>
    <div class="card-body">
        <form action="{{ route('post.update',$post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title <span>*</span></label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label>Description <span>*</span></label>
                <textarea class="form-control" name="description" rows="3">{{$post->description}}</textarea>
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" value="0" <?php echo ($post->status == 1 ? 'checked' : ''); ?>>
                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-5">Edit</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</div>
@endsection