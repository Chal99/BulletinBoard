@extends('layouts.default')
@section('content')
<script src="{{ asset('js/alertdelay.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Register
    </div>
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
        <form action="{{ url('/user/confirmation') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="type-selected">Type</label>
                <select class="form-control" name="type" value="{{ old('type') }}">
                    <option disable>Please Select Type</option>
                    <option value="0" id="type" <?php echo (old('type')== 0 ? 'selected' : '') ?>>User</option>
                    <option value="1" id="type" <?php echo (old('type')== 1 ? 'selected' : '') ?>>Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control"value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address">{{ old('address') }}</textarea>
            </div>
            <div class="form-group">
                <label>Profile</label>
                <input type="file" name="profile" class="form-control-file">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button class="btn btn-success mr-5" type="submit">Register</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</div>
@endsection