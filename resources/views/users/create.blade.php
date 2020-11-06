@extends('layouts.default')
@section('content')

<div class="card m-5">
    <div class="card-header">
        Register
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="">Name</label>
                <input type="email" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Email Address</label>
                <textarea class="form-control" id="" rows="3" placeholder=""></textarea>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="type-selected">Type</label>
                <select class="form-control" id="type-selected">
                    <option disable>Please Select Type</option>
                    <option>User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="email" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Date Of Birth</label>
                <input type="date" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea class="form-control" id="" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="">Profile</label>
                <input type="file" class="form-control-file" id="">
            </div>
            <div class="form-group d-flex justify-content-end">
                <a class="btn btn-primary mr-5" data-dismiss="modal" href="{{route('confirm-user')}}">Register</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection