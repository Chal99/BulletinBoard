@extends('layouts.default')
@section('content')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
<link href="{{ asset('bootstrap-switch-master\dist\css\bootstrap4\bootstrap-switch.css') }}" rel="stylesheet">
<script src="{{ asset('bootstrap-switch-master\dist\js\bootstrap-switch.js') }}"></script>
<script src="{{ asset('js/postedit.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Edit Post
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label>Title <span>*</span></label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label> Descripption <span>*</span></label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <label class="mr-5"> Status </label>
            <input type="checkbox" name="postedit-status" checked>
            <div class="form-group d-flex justify-content-end">
                <button type="button" class="btn btn-primary mr-5">Edit</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</div>
@endsection