@extends('layouts.default')
@section('content')

<div class="card m-5">
    <div class="card-header">
        Upload CSV File
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label>CSV File :</label>
                <input type="file">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="button" class="btn btn-primary mr-5" data-dismiss="modal">Upload</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
            </div>
        </form>
    </div>
</div>

@endsection