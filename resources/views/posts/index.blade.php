@extends('layouts.default')
@section('content')
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
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-primary"> Search </button>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-outline-primary" href=""> Create </a>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-outline-primary" href=""> Upload </a>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-primary"> Download </button>
                </div>
            </div>
        </div>
        <table id="post-list-table" class="table table-striped table-bordered" style="width:100%">
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
                    <td><a href="" data-toggle="modal" data-target="#PostDetailModel">{{$post->title}}</a></td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td class="d-flex justify-content-center p-3">
                        <a class="btn btn-warning mr-3" href="{{route('post-edit')}}">Edit</a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#PostDeleteModel">Delete</a>
                    </td>
                </tr>
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
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Description</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Status</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Created Date</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Created User</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Updated Date</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Updated User</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>Example</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="PostDeleteModel">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Post Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row ml-1">
                    <label>Are You Sure Want To Delete Post ?</label>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">ID</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>001</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Title</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Description</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Status</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8 col-form-label">
                        <label>Active</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger mr-3">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection