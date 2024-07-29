@extends('layouts.navbar')

@section('title')
Export products
@endsection

@section('buttons')
<a href="{{ route('products.list') }}" type="button" class="btn-primary btn">List</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            Export Excel File
        </div>
        <div class="card-body">
            <form action="{{ route('products.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="file">Choose Excel File</label><br>
                <input type="file" id="file" name="file"><br>
                @error('file')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <br>
                <button type="submit" class="btn-success btn">Export</button>
            </form>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Products exported!</strong>
            </div>
        @endif
    </div>
</div>
@endsection