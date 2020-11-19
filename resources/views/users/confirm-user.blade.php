@extends('layouts.default')
@section('content')
<script src="{{ asset('js/alertdelay.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Register Confirm
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
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Profile</label>
                <div class="col-sm-12 mr-auto">
                    <div class="col-sm-12 mr-auto">
                        <input type="hidden" name="profile" value="{{$image}}" >
                        <img src="{{asset($image)}}" alt="profile" class="img-thumbnail rounded mx-auto d-block">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$name}}">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" class="form-control" name="email" value="{{$email}}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="{{$password}}">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" value="{{$confirmpassword}}">
            </div>
            <div class="form-group">
                <label for="type-selected">Type</label>
                <select class="form-control" name="type" id="type-selected">
                    <option disable>Please Select Type</option>
                    <option value="0" id="type" <?php echo ($type == 0 ? 'selected' : '') ?>>User</option>
                    <option value="1" id="type" <?php echo ($type == 1 ? 'selected' : '') ?>>Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" value="{{$phone}}">
            </div>
            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{$dob}}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address" rows="3">{{$address}}</textarea>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-5">Confirm</button>
                <a class="btn btn-secondary" href="{{route('user.create')}}">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection