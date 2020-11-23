@extends('layouts.default')
@section('content')
<script src="{{ asset('js/alertdelay.js') }}"></script>
<script src="{{ asset('js/modeljq.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        User Edit
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
        <form action="{{ route('user.update',$user->id) }}" id="user_edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="email" class="form-control" value="{{$user->email}}"></textarea>
            </div>
            <div class="form-group">
                <label for="type-selected">Type</label>
                <select class="form-control" name="type" id="type-selected" value="{{$user->type}}">
                    <option disable>Please Select Type</option>
                    <option value="0" id="type" <?php echo ($user->type == 0 ? 'selected' : '') ?>>User</option>
                    <option value="1" id="type" <?php echo ($user->type == 1 ? 'selected' : '') ?>>Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
            </div>
            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{$user->dob}}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" rows="3">{{$user->address}}</textarea>
            </div>
            <div class="form-group">
                <label>Old Profile</label>
                <div class="col-sm-12 mr-auto">
                    <img src="{{asset($user->profile)}}" alt="profile" class="img-thumbnail rounded mx-auto d-block">
                </div>
                <label>New Profile</label>
                <input type="file" class="form-control-file" name="profile">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-5">Edit</button>
                <button type="button" class="btn btn-secondary reset_btn">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection