@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{ asset('css/listdatatable.css') }}">
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/lib/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/lib/monent.min.js') }}"></script>
<script src="{{ asset('js/usersearch.js') }}"></script>
<script src="{{ asset('js/alertdelay.js') }}"></script>
<script src="{{ asset('js/modeljq.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        User Lists
    </div>
    <div class="card-body">
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control form-control-sm mr-2" id="search-name">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control form-control-sm mr-2" id="search-email">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">From</label>
                        <input type="date" class="form-control form-control-sm mr-2" id="min">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">To</label>
                        <input type="date" class="form-control form-control-sm mr-2" id="max">
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <button type="button" class="btn btn-primary" id="btnSearch">Search</button>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row">
            <table id="table-list" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created User</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>Date Of Birth</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><a href="#UserDetailModel" data-toggle="modal" class="open-UserDetailModel" data-photo="{{asset($user->profile)}}" data-name="{{$user->name}}" data-type="{{$user->type}}" data-email="{{$user->email}}" data-phone="{{$user->phone}}" data-dob="{{$user->dob}}" data-address="{{$user->address}}" data-createuserid="{{$user->create_user_id}}" data-updateduserid="{{$user->updated_user_id}}" data-createddate="{{$user->created_at}}" data-updateddate="{{$user->updated_at}}">{{$user->id}}</a></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->create_user_id}}</td>
                        <td>{{$user->type}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->dob}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td class="d-flex justify-content-center p-3">
                            <a class="btn btn-warning mr-3" href="{{route('user.edit', $user->id)}}">Edit</a>
                            <button class="btn btn-danger" href="#" data-target="#UserDeleteModel" data-toggle="modal" data-id="{{$user->id}}" data-name="{{$user->name}}" data-type="{{$user->type}}" data-email="{{$user->email}}" data-phone="{{$user->phone}}" data-dob="{{$user->dob}}" data-address="{{$user->address}}" data-address="{{$user->address}}">Delete</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="UserDeleteModel">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold">User Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('user.destroy', $user->id) }}" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" id="user_id">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-bold">ID</label>
                                            <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                            <div class="col-sm-8 col-form-label">
                                                <input type="text" id="id" class="form-control form-control-sm border-0" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-bold">Name</label>
                                            <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                            <div class="col-sm-8 col-form-label">
                                                <input type="text" id="name" class="form-control form-control-sm border-0" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-bold">Type</label>
                                            <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                            <div class="col-sm-8 col-form-label">
                                                <input type="text" id="type" class="form-control form-control-sm border-0" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-bold">Email</label>
                                            <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                            <div class="col-sm-8 col-form-label">
                                                <input type="text" id="email" class="form-control form-control-sm border-0" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-bold">Phone</label>
                                            <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                            <div class="col-sm-8 col-form-label">
                                                <input type="text" id="phone" class="form-control form-control-sm border-0" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-bold">Date Of Birth</label>
                                            <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                            <div class="col-sm-8 col-form-label">
                                                <input type="text" id="dob" class="form-control form-control-sm border-0" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-bold">Address</label>
                                            <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                            <div class="col-sm-8 col-form-label">
                                                <input type="text" id="address" class="form-control form-control-sm border-0" readonly />
                                            </div>
                                        </div>
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger mr-3">Delete</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="UserDetailModel">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">User Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-12 m-auto">
                        <img src="" alt="profile" class="img-thumbnail rounded mx-auto d-block">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Name</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="name" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Type</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="type" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Email</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="email" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Phone</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="phone" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Date Of Birth</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="dob" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Address</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="address" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Created Date</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="created-date" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Created User</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="create-user" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Updated Date</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="updated-date" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Updated User</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="updated-user" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection