@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{ asset('css/listdatatable.css') }}">
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/lib/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/postsearch.js') }}"></script>
<script src="{{ asset('js/alertdelay.js') }}"></script>
<script src="{{ asset('js/modeljq.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Post Lists
    </div>
    <div class="card-body">
        <div class="container d-flex justify-content-end">
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-3 border border-primary rounded">
                        <div class="input-group-prepend">
                            <span class="input-group-text ">Keyword :</span>
                        </div>
                        <input type="text" class="form-control" id="user-search">
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-primary" id="btnSearch"> Search </button>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-outline-primary" href="{{route('post.create')}}"> Create </a>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-outline-primary" href=""> Upload </a>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-primary"> Download </button>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table id="table-list" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Post Description</th>
                    <th>Posted User</th>
                    <th>Posted Date</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td><a href="#PostDetailModel" data-toggle="modal" class="open-PostDetailModel" data-title="{{$post->title}}" data-description="{{$post->description}}" data-status="{{$post->status}}" data-createuserid="{{$post->create_user_id}}" data-updateduserid="{{$post->updated_user_id}}" data-createddate="{{$post->created_at}}" data-updateddate="{{$post->updated_at}}">{{$post->title}}</a></td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td class="d-flex justify-content-center p-3">
                        <a class="btn btn-warning mr-3" href="{{ route('post.edit', $post->id) }}">Edit</a>
                        <button class="btn btn-danger" href="#" data-target="#PostDeleteModel" data-toggle="modal" data-id="{{$post->id}}" data-title="{{$post->title}}" data-description="{{$post->description}}" data-status="{{$post->status}}">Delete</button>
                    </td>
                </tr>
                <div class="modal fade" id="PostDeleteModel">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('post.destroy', $post->id) }}" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="post_id" id="post_id">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bold">ID</label>
                                        <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                        <div class="col-sm-8 col-form-label">
                                            <input type="text" id="id" class="form-control form-control-sm border-0" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bold">Title</label>
                                        <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                        <div class="col-sm-8 col-form-label">
                                            <input type="text" id="title" class="form-control form-control-sm border-0" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bold">Description</label>
                                        <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                        <div class="col-sm-8 col-form-label">
                                            <input type="text" id="description" class="form-control form-control-sm border-0" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bold">Status</label>
                                        <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                                        <div class="col-sm-8 col-form-label">
                                            <input type="text" id="status" class="form-control form-control-sm border-0" readonly />
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
<div class="modal fade" id="PostDetailModel">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Post Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Title</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="title" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Description</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="description" class="form-control form-control-sm border-0" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Status</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <input type="text" id="status" class="form-control form-control-sm border-0" readonly />
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