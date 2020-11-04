@extends('layouts.default')
@section('content')

<link rel="stylesheet" href="{{ asset('css/listdatatable.css') }}">

<script src="{{ asset('js/lib/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/lib/dataTables.bootstrap4.min.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
    User Lists
    </div>
    <div class="card-body">
   
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-2">
                <input type="text" placeholder="Ender Name" class="mr-2">
            </div>
            <div class="col-md-2">
                <input type="text" placeholder="Ender Email">
            </div>
            <div class="col-md-2">
                <input type="date">
            </div>
            <div class="col-md-2">
                <input type="date">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary">Search</button>
            </div>
            
        </div>
    </div>
    <div class="row"  style="overflow-x:auto;">
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
            <tfoot>
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
            </tfoot>
        </table>
    </div>
  </div>
</div>
@endsection