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
                        <input type="hidden" name="profile" value="{{ $image }}">
                        <img src="{{ asset($image) }}" name="profile" alt="profile" class="img-thumbnail rounded mx-auto d-block">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $name }}" readonly />
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" class="form-control" name="email" value="{{ $email }}" readonly />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="{{ $password }}"readonly />
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="text" name="confirmpassword" class="form-control" value="{{ $confirmpassword }}" readonly />
            </div>
            <div class="form-group">
                <label for="type-selected">Type</label>
                @if ($type==0)
                <input type="text" class="form-control" value="User" readonly />
                <input type="hidden" name="type" value="0">
                @else
                <input type="text" class="form-control" value="Admin" readonly />
                <input type="hidden" name="type" value="1">
                @endif
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $phone }}" readonly />
            </div>
            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{ $dob }}" readonly />
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address" rows="3" readonly >{{ $address }}</textarea>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" name="action" value="save" class="btn btn-primary mr-5">Confirm</button>
                <button type="submit" name="action" value="cancel" class="btn btn-primary">Cancel</button>    
            </div>
        </form>
    </div>
</div>

@endsection