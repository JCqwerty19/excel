@extends('layouts.navbar')

@section('title')
{{ $product->name }}
@endsection

@section('buttons')
<a href="{{ route('products.export') }}" type="button" class="btn-success btn">Export</a>
<a href="{{ route('products.list') }}" type="button" class="btn-primary btn">List</a>
@endsection

@section('content')
<h1 class="mb-4">{{ $product->name }}</h1>

        <div class="row">
            @foreach($product->photos as $photo)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ $photo->url }}" class="card-img-top" alt="Фото продукта">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            <h4>Price: {{ $product->price }} {{ $product->currency }}</h4>
            <p>{{ $product->description }}</p>
            <p>Colour: {{ $product->additional->first()->colour }}</p>
            <p>Size: {{ $product->additional->first()->size }}</p>
            <p>Structure: {{ $product->additional->first()->structure }}</p>
        </div>

        <div class="mt-4">
            
            <div>
                <div class="card card-body mt-2">
                    <p><strong>Group:</strong> {{ $product->group }}</p>
                    <p><strong>EAN13:</strong> {{ $product->ean13_code }}</p>
                    <p><strong>Excise mark:</strong> {{ $product->excise }}</p>
                </div>
            </div>
        </div>
        
        <a href="{{ url()->previous() }}" class="btn btn-primary mt-4">Назад</a>
@endsection