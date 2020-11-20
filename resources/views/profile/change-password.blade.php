@extends('layouts.default')
@section('content')
<script src="{{ asset('js/alertdelay.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Change Password
    </div>
    @if ($message = Session::get('fail'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-body">
        <form action="{{url('/user/update-password')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Current Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">New Password</label>
                <input type="password" class="form-control" name="new_psw">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">New Confirm Password</label>
                <input type="password" class="form-control" name="new_confirm_psw">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
        </form>
    </div>
</div>

@endsection