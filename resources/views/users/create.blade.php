@extends('layouts.default')
@section('content')

<div class="card m-5">
    <div class="card-header">
        Register
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label>Name</label>
                <input type="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="type-selected">Type</label>
                <select class="form-control" id="type-selected">
                    <option disable>Please Select Type</option>
                    <option>User</option>
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Profile</label>
                <input type="file" class="form-control-file">
            </div>
            <div class="form-group d-flex justify-content-end">
                <a class="btn btn-primary mr-5" data-dismiss="modal" href="{{route('confirm-user')}}">Register</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection