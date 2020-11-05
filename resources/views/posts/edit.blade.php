@extends('layouts.default')
@section('content')
<link href="{{ asset('bootstrap-switch-master\dist\css\bootstrap4\bootstrap-switch.css') }}" rel="stylesheet">
<script src="{{ asset('bootstrap-switch-master\dist\js\bootstrap-switch.js') }}"></script>
<script src="{{ asset('js/postedit.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Create Post
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="email" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Descripption</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <label for="" class="mr-5"> Status </label>
            <input type="checkbox" name="postedit-status" checked>
            <div class="form-group d-flex justify-content-end">
                <button type="button" class="btn btn-primary mr-5" data-dismiss="modal">Create</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="button" class="btn btn-primary mr-5" data-dismiss="modal">Edit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection