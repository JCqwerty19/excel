@extends('layouts.navbar')

@section('title')
Products
@endsection

@section('content')
<div class="row">
    @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price}} {{ $product->currency }}</p>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection