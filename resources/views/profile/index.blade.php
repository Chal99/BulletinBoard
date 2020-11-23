@extends('layouts.default')
@section('content')

<div class="card m-5">
    <div class="card-header">
        Profile
    </div>
    <div class="card-body">
        <div class="container">
            <div class="form-group row">
                <div class="col-sm-12 m-auto">
                    <img src="{{asset($profile)}}" width="620" alt="profile" class="img-thumbnail rounded mx-auto d-block">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Name</label>
                <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                <div class="col-sm-8 col-form-label">
                    <input type="text" id="name" class="form-control form-control-sm border-0" value="{{$name}}" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Type</label>
                <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                <div class="col-sm-8 col-form-label">
                    <input type="text" id="type" class="form-control form-control-sm border-0" value="{{$type}}" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Email</label>
                <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                <div class="col-sm-8 col-form-label">
                    <input type="text" id="email" class="form-control form-control-sm border-0" value="{{$email}}" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Phone</label>
                <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                <div class="col-sm-8 col-form-label">
                    <input type="text" id="phone" class="form-control form-control-sm border-0" value="{{$phone}}" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Date Of Birth</label>
                <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                <div class="col-sm-8 col-form-label">
                    <input type="text" id="dob" class="form-control form-control-sm border-0" value="{{$dob}}" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Address</label>
                <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                <div class="col-sm-8 col-form-label">
                    <input type="text" id="address" class="form-control form-control-sm border-0" value="{{$address}}" readonly />
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <a class="btn btn-primary" href="#">Edit Profile</a>
            </div>
        </div>
    </div>
</div>

@endsection