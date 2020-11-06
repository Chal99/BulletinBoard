@extends('layouts.default')
@section('content')

<div class="card m-5">
    <div class="card-header">
        Register Confirm
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleFormControlFile1">Profile</label>
            <div class="col-sm-12 mr-auto">
                <img src="data:image/png;base64,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" alt="..." class="img-thumbnail rounded mx-auto d-block">
            </div>
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="email" class="form-control" id="" placeholder="Example">
        </div>
        <div class="form-group">
            <label for="">Email Address</label>
            <textarea class="form-control" id="" rows="3"  placeholder="Example"></textarea>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="email" class="form-control" id="" placeholder="Example">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="email" class="form-control" id="" placeholder="Example">
        </div>
        <div class="form-group">
            <label for="type-selected">Type</label>
            <select class="form-control" id="type-selected">
                <option Checked>User</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="email" class="form-control" id="" placeholder="9999">
        </div>
        <div class="form-group">
            <label for="">Date Of Birth</label>
            <input type="date" class="form-control" id="" placeholder="12/2/2020">
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <textarea class="form-control" id="" rows="3" placeholder="Example"></textarea>
        </div>
        <div class="form-group d-flex justify-content-end">
            <button type="button" class="btn btn-primary mr-5" data-dismiss="modal">Confirm</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        </div>
    </div>
</div>
@endsection