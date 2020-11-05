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
                <label for="">Title  <span>*</span></label>
                <input type="email" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Descripption  <span>*</span></label>
                <textarea class="form-control" id="" rows="3"></textarea>
            </div>
            <label for="" class="mr-5"> Status </label>
            <input type="checkbox" name="postedit-status" checked>
            <div class="form-group d-flex justify-content-end">
                <button type="button" class="btn btn-primary mr-5" data-dismiss="modal">Edit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
            </div>
        </form>
    </div>
</div>
@endsection