@extends('layouts.default')
@section('content')

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
            
            <div class="form-group d-flex justify-content-end">
                <button type="button" class="btn btn-primary mr-5" data-dismiss="modal">Create</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection