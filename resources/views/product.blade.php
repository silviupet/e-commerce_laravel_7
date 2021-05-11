@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <div class="ui container masthead">

        <div class="ui breadcrumb">
            <a href="{{ route('home') }}" class="section">Home</a>
            <i class="right angle icon divider"></i>
            <a href="{{ route('shop.index') }}" class="section">Shop</a>
            <i class="right angle icon divider"></i>
            <div class="active section">{{ $product->name }}</div>
        </div>

    </div>

    <div class="ui divider"></div>

    <div class="ui vertical segment product">
        <div class="ui stackable grid container">
            <div class="row">
            
                <div class="six wide column">
                    <img src="/images/laptop.jpg" class="ui large bordered rounded image">
                </div>

                <div class="ten wide right floated column">
                    <h1 class="ui header">{{ $product->name }}</h1>
                    <p class="lead">{{ $product->details }}</p>

                    <h1 class="ui green header">{{ $product->present_price }}</h2>

                    <div class="ui product-content">
                        {{ $product->description }}
                    </div>
                    
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">

                        <button class="ui button" type="submit">
                            <i class="shopping cart icon"></i>
                            Add to Cart
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    @include('partials.might-like')


@endsection
