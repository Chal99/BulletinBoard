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
                        <span class="input-group-text ">Email</span>
                    </div>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-outline-primary"> Search </button>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-outline-primary"> Create </button>
            </div>
            <div class="col-md-2">
                <button  type="button" class="btn btn-outline-primary"> Upload </button>
            </div>
            <div class="col-md-2">
                <button  type="button" class="btn btn-outline-primary"> Download </button>
            </div>
        </div>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
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
            
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009/02/27</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010/07/14</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008/11/13</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
            </tr>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Post Title</th>
                <th>Post Description</th>
                <th>Posted User</th>
                <th>Posted Date</th>
                <th>Operation</th>
            </tr>
        </tfoot>
    </table>
  </div>
</div>
@endsection