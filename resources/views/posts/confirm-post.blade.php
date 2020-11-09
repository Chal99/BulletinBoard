@extends('layouts.default')
@section('content')

<div class="card m-5">
    <div class="card-header">
        Confirm Post
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label>Title </label>
                <input type="text" class="form-control" placeholder="Post4">
            </div>
            <div class="form-group">
                <label>Descripption</label>
                <textarea class="form-control" rows="3" placeholder="postdescripiton"></textarea>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="button" class="btn btn-primary mr-5">Confirm</button>
                <a class="btn btn-secondary" href="{{route('post-create')}}">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection