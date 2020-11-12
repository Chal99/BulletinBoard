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
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm-password" class="form-control">
            </div>
            <div class="form-group">
                <label for="type-selected">Type</label>
                <select class="form-control" name="type">
                    <option disable>Please Select Type</option>
                    <option value="0" id="type">User</option>
                    <option value="1" id="type">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" name="dob" class="form-control">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address"></textarea>
            </div>
            <div class="form-group">
                <label>Profile</label>
                <input type="file" name="profile" class="form-control-file">
            </div>
            <div class="form-group d-flex justify-content-end">
                <!-- <a class="btn btn-primary mr-5" href="{{route('confirm-user')}}">Register</a> -->
                <button class="btn btn-success mr-5" type="submit">
                    Register
                </button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection