@extends('layouts.navbar')

@section('title')
{{ $product->name }}
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
        </div>
        
        <a href="{{ url()->previous() }}" class="btn btn-primary mt-4">Назад</a>
@endsection