@extends('layouts.default')
@section('content')
<script src="{{ asset('js/alertdelay.js') }}"></script>

<div class="card m-5">
    <div class="card-header">
        Upload CSV File
    </div>
    @if ($errors->import->any())
    <div class="alert alert-danger">
        The import has following errors in <strong>line {{ session('error_line') }}</strong>:
        <ul>
            @foreach ($errors->import->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @error ('file')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    @if ($message = Session::get('status'))
    <div class="alert alert-success mt-3">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('fail'))
    <div class="alert alert-danger mt-3">
        <p>{{ $message }}</p>
    </div>
    @endif
    
    <div class="card-body">
        <form id="excel-csv-import-form" method="POST" action="{{ url('/post/uploaded') }}" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>CSV File :</label>
                <input type="file" name="file" placeholder="Choose file">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-5">Upload</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</div>
@endsection