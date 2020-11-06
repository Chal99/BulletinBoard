@extends('layouts.default')
@section('content')

<div class="card m-5">
    <div class="card-header">
        Change Password
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Current Password </label>
                <input type="password" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">New Password</label>
                <input type="password" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">New Confirm Password</label>
                <input type="password" class="form-control" id="">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Update Password</button>
            </div>
        </form>
    </div>
</div>

@endsection