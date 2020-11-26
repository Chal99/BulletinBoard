@extends('layouts.default')
@section('content')
<script src="{{ asset('js/alertdelay.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Profile Edit
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
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control inputField" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="email" id="email" class="form-control inputField" value="{{ Auth::user()->email }}"></textarea>
            </div>
            <div class="form-group">
                <label for="type-selected">Type</label>
                <select class="form-control inputField" name="type" id="type-selected" value="{{ Auth::user()->type }}">
                    <option disable>Please Select Type</option>
                    <option value="0" id="type" <?php echo ($user->type == 0 ? 'selected' : '') ?>>Admin</option>
                    <option value="1" id="type" <?php echo ($user->type == 1 ? 'selected' : '') ?>>User</option>
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" id="phone" class="form-control inputField" value="{{ Auth::user()->phone }}">
            </div>
            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control inputField" value="{{ Auth::user()->dob }}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" id="address" class="form-control inputField" rows="3">{{ Auth::user()->address }}</textarea>
            </div>
            <div class="form-group">
                @if (Auth::user()->profile != null)
                <label>Old Profile</label>
                <div class="col-sm-12 mr-auto">
                    <img src="{{ asset(Auth::user()->profile) }}" id="profile" alt="profile" class="img-thumbnail rounded mx-auto d-block">
                    <input type="hidden" name="profile" value="{{ Auth::user()->profile }}">
                </div>
                <label>New Profile</label>
                <input type="file" class="form-control-file" name="profile_new">
                @else
                <label>New Profile</label>
                <input type="file" class="form-control-file" name="profile_new">
                @endif
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" value="User" class="btn btn-primary mr-5">Edit</button>
                <button type="button" id="resetBtn" class="btn btn-secondary reset_btn">Clear</button>
                @if(Auth::check())
                <a href="{{ route('user.change_password') }}" class="btn btn-warning reset_btn ml-5">Change Password</a>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection