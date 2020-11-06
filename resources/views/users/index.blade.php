@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{ asset('css/listdatatable.css') }}">

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
                        <input type="text" class="form-control form-control-sm mr-2">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control form-control-sm mr-2">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">From</label>
                        <input type="date" class="form-control form-control-sm mr-2">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">To</label>
                        <input type="date" class="form-control form-control-sm mr-2">
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
        <div class="row">
            <table id="post-list-table" class="table table-striped table-bordered">
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
                    <tr>
                        <td><a href="" data-toggle="modal" data-target="#UserDetailModel">Lael Greer</a></td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td><a class="btn btn-warning" href="{{route('useredit')}}">Edit</a></td>
                    </tr>
                    <tr>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>2009/02/27</td>
                    </tr>
                    <tr>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>2009/02/27</td>
                    </tr>
                    <tr>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>2009/02/27</td>
                    </tr>
                    <tr>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>2009/02/27</td>
                    </tr>
                </tbody>
            </table>
        </div>
  </div>
</div>
<div class="modal fade" id="UserDetailModel">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">User Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-12 m-auto">
                        <img src="data:image/png;base64,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" alt="..." class="img-thumbnail rounded mx-auto d-block">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Name</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Type</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Email</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
                        <label for="">Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Phone</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
                        <label for="">Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Date Of Birth</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
                        <label for="">Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Address</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Created Date</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Created User</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Updated Date</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
                        <label>Example</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label font-weight-bold">Updated User</label>
                    <label class="col-sm-1 col-form-label font-weight-bold">:</label>
                    <div class="col-sm-8">
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
@endsection